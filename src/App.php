<?php

namespace App;

class App
{
    public function __construct(private string $path) {
        if(!file_exists($path) || !is_dir($path)) {
            die('path "' . $path . '" invalid');
        }
    }
    
    public function versions(): array
    {
        $output = shell_exec('cd ' . $this->path . ' && git tag -l');

        if(empty($output)) {
            die('error');
        }

        return array_filter(explode("\n", $output), fn($tag) => !empty($tag));
    }

    public function switch(string $tag): void
    {
        shell_exec('cd ' . $this->path . ' && git checkout ' . $tag);
    }

    public function current(): string
    {
        return shell_exec('cd ' . $this->path . ' && git status');
    }
}