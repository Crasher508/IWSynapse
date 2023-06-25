<?php

class Indiware
{

    private array $data = [];

    public function __construct(
       private readonly string $url,
       private readonly string $username,
       private readonly string $password
    ) {
        if (!str_ends_with($this->url, ".xml")) {
            echo "XML File needed!";
            return;
        }
        $opts = ['http' =>
            [
                'method' => 'POST',
                'header' => "Content-Type: text/xml\r\n" .
                    "Authorization: Basic " . base64_encode($this->username . ":" . $this->password) . "\r\n",
                'content' => "",
                'timeout' => 60
            ]
        ];
        $context = stream_context_create($opts);
        $result = file_get_contents($this->url, false, $context);
        $result = str_replace(array("\n", "\r", "\t"), '', $result);
        $result = trim(str_replace('"', "'", $result));
        $result = simplexml_load_string($result);
        $resultJson = json_encode($result);
        $array = json_decode($resultJson, true);
        if (is_array($array))
            $this->data = $array;
    }

    public function getHeader() : ?Header {
        if (empty($this->data["Kopf"]))
            return null;
        return Header::fromArray($this->data["Kopf"]);
    }
}