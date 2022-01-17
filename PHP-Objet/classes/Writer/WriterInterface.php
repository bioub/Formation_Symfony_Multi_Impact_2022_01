<?php

namespace MultiImpact\Writer;

interface WriterInterface
{
    public function write(string $message): void;
}