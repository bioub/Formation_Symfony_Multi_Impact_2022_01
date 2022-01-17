<?php

namespace MultiImpact\Writer;


class NullWriter implements WriterInterface
{
    protected $handle;

    public function write(string $message): void {
    }

}