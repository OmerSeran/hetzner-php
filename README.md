
```php

$hetzner = new Hetzner([
	"token" => "TOKEN"
]);

// getAllServers();

$getservers = $hetzner->getAllServers();

print_r($getservers);

// getServer($id);

$getserverinfo = $hetzner->getServer($id);

print_r($getserverinfo);

// createServer($array){

$createaserver = $hetzner->createServer([

"name" => "TEST-SERVER",
"server_type" => "cx11",
"image" => "ubuntu-16.04",

]);

print_r($createaserver);

// deleteServer($id)

$deleteaserver = $hetzner->deleteServer(3611100);

print_r($deleteaserver);

// startServer($id)

$startaserver = $hetzner->startServer(3611100);

print_r($startaserver);

// rebootServer($id)

$rebootaserver = $hetzner->rebootServer(3611100);

print_r($rebootaserver);

// restartServer($id){

$restartaserver = $hetzner->restartServer(3611100);

print_r($restartaserver);

// shutdownServer($id)

$shutdownaserver = $hetzner->shutdownServer(3611100);

print_r($shutdownaserver);

// stopServer($id)

$stopaserver = $hetzner->stopServer(3611100);

print_r($stopaserver);

// resetRootPassword($id)

$resetrootpassword = $hetzner->resetRootPassword(3611100);

print_r($resetrootpassword);

// rebuildServer($id)

$rebuildserver = $hetzner->rebuildServer(3611100, [
"image" => "ubuntu-18.04"
]);

print_r($rebuildserver);



```
