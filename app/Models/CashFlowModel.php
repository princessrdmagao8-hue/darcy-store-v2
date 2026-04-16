<?php
namespace App\Models;
use CodeIgniter\Model;

class CashFlowModel extends Model {
    protected $table = 'cash_flows';
    protected $primaryKey = 'id';
    protected $allowedFields = ['type', 'amount', 'description', 'created_at'];
}