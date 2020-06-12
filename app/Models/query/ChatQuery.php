<?php


namespace App\Models\query;


trait ChatQuery
{
    public function isNotDeleted()
    {
        return $this->whereNull('chats.deleted_at');
    }
}
