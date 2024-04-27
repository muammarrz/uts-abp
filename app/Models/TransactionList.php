<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionList extends Model
{
    use HasFactory;

    protected $table = 'transaction_list';

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'transaction_time',
        'transaction_status',
        'transaction_id',
        'three_ds_version',
        'status_message',
        'status_code',
        'signature_key',
        'payment_type',
        'order_id',
        'merchant_id',
        'masked_card',
        'gross_amount',
        'fraud_status',
        'expiry_time',
        'eci',
        'currency',
        'channel_response_message',
        'channel_response_code',
        'card_type',
        'bank',
        'approval_code',
        'metadata', // Optional: fillable if you want to store JSON data
    ];

    public $incrementing = false; // Ensure Laravel doesn't treat order_id as auto-incrementing
}
