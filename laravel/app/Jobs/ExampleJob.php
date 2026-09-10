<?php

namespace App\Jobs;

use App\Models\Example;
use App\Http\Requests\StoreExampleRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use PhpAmqpLib\Message\AMQPMessage;

class ExampleJob implements ShouldQueue
{
    use Queueable;

    protected string $message;

    /**
     * Create a new job instance.
     */
    public function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // echo "Начало работы!\n";
        echo $this->message;
        echo "\n";

        $note = json_decode($this->message, true);
        // echo "Прочитали строку!\n";

        Example::create($note);
        // echo "Запихали строку!";
    }
}
