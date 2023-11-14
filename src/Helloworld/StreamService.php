<?php declare(strict_types=1);

namespace Helloworld;

use OpenSwoole\GRPC;

class StreamService implements StreamInterface
{
    /**
    * @param GRPC\ContextInterface $ctx
    * @param HelloRequest $request
    * @return HelloReply
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function FetchResponse(GRPC\ContextInterface $ctx, HelloRequest $request): HelloReply
    {
        while (1) {
            $name = $request->getName();
            $out  = new HelloReply();
            $out->setMessage('hello ' . $name . time());

            $message = new GRPC\Message($ctx, $out);

            $ctx['WORKER_CONTEXT']->getValue(\OpenSwoole\GRPC\Server::class)->push($message);
            \Swoole\Coroutine::sleep(1);
        }
    }
}
