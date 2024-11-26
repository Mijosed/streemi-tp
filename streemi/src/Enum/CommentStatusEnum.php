<?php
 

namespace App\Enum;


enum CommentStatusEnum: string {
    case PENDING = 'pending';
    case REJECTED = 'rejected';
    case VALIDATED = 'validated';
}

