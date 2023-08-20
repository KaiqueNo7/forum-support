<?php

namespace App\DTO\Supports;

use App\Http\Requests\StoreUpdateSupport;

class UpdateSupportDTO
{
    public function __construct(
        public string $id,
        public string $subject,
        public string $status,
        public string $body,
    ) {}

    public static function makeFromResquest(StoreUpdateSupport $request, string $id = null): self
    {
        return new self(
            $id ?? $request->id,
            $request->subject,
            'a',
            $request->body
        );
    }
}
