<?php

declare(strict_types=1);

namespace DaggerModule;

use Dagger\Attribute\{DaggerObject, DaggerFunction};
use Dagger\Service;

use function Dagger\dag;

#[DaggerObject]
class MyModule
{
    #[DaggerFunction]
    public function httpService(): Service
    {
        return dag()
            ->container()
            ->from('python')
            ->withWorkdir('/srv')
            ->withNewFile('index.html', 'Hello, world!')
            ->withExposedPort(8080)
            ->asService(args: ['python', '-m', 'http.server', '8080']);
    }
}
