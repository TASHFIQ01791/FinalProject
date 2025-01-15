<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Bid;
use App\Models\Product;


class BidWinnerNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $bid;
    public $product;

    public function __construct(Bid $bid, $product)
    {
        $this->bid = $bid;
        $this->product = $product;
    }

    public function build()
    {
        return $this->subject('Congratulations! You are the highest bidder')
                    ->view('emails.bid_winner_notification');
    }
}

