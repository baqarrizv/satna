<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Get tax percent from .env
        $taxPercent = env('TAX_PERCENT', 17);
        
        // Update existing Card payments that have tax=0
        $payments = Payment::where('payment_mode', 'Card')
            ->where(function($query) {
                $query->whereNull('tax')
                    ->orWhere('tax', 0);
            })
            ->get();
            
        foreach ($payments as $payment) {
            $netAmount = $payment->total; // Net amount already stored in total
            $taxAmount = round($netAmount * ($taxPercent / 100), 2);
            
            $payment->tax = $taxAmount;
            $payment->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reset tax to 0 for Card payments updated by this migration
        Payment::where('payment_mode', 'Card')
            ->update(['tax' => 0]);
    }
}; 