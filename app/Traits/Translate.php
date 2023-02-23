<?php

namespace App\Traits;

trait Translate
{
    public function title()
    {
        return $this['title_'.lang()] ?? null;
    }

    public function desc()
    {
        return $this['desc_'.lang()] ?? null;
    }
}
