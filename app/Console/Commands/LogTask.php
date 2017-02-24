<?php

namespace App\Console\Commands;

use App\CompletedTask;
use App\Helpers\Helpers;
use Carbon\Carbon;
use DB;
use Illuminate\Console\Command;

class LogTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tamamlanan tasklerin logunu tutun';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        Carbon::setLocale('tr');
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Şimdiki zamanı ata
        $nowString = Carbon::now()->toDateTimeString();
        $now       = Carbon::now();
        //Task tablosundan  şimdiki zamana eşit olan verileri çek
        $completedTasksFromTasksTable = DB::table('tasks')
                                          ->where('end_date', $nowString);


        // completedTask tablosundan instance yarat
        $completedTask = new CompletedTask();

        //Task tablosundan çekilen verileri foreach ile döndür
        foreach ($completedTasksFromTasksTable->get() as $completedTaskFromTasksTable) {

            //Task tablosundan dönen verinin hangi TodoList'e ait olduğunu bul
            $todo = \App\Todo::find($completedTaskFromTasksTable->todo_id);

            $completedTask->save([
                'user_id'        => $todo->user->id, //Tamamlanan Task'ın sahibi
                'task_id'        => $completedTaskFromTasksTable->id, //Tamamlanan Task'ın id'si
                'completed_date' => $completedTaskFromTasksTable->end_date ////Tamamlanan Task'ın bitiş tarihi
            ]);

            // Task tablosundan tamamlanan Task'ın yeni tarihini,
            // eski tarihlerimizi baz alarak ve eski tarihler arasındaki farkı hesaplayarak günümüz zamanı
            // referansımız kabul edip yeni bir tarih oluştur.
            $completedTasksFromTasksTable
                ->update([
                    'start_date' => $now,
                    'end_date'   => $now->addDay(Helpers::diffInDays($completedTaskFromTasksTable->start_date,
                        $completedTaskFromTasksTable->end_date)),
                ]);
        }

        \Log::info('CompletedTask tablosuna yeni bir veri girildi ve Task\'ın Başlangıç ve Bitiş günü güncellendi.');


    }
}
