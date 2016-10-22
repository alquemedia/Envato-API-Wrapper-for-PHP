<?php namespace Alquemedia_Envato_PHP_Wrapper\cURL;
use Alquemedia_Envato_PHP_Wrapper\Utilities\URI_Request_String;

/**
 * Class cURL_Invocation
 * @package Code_Alchemy\cURL
 *
 * Invoke a cURL call
 */
class cURL_Invocation {

    /**
     * @var array of data
     */
    private $data = array();

    /**
     * cURL_Invocation constructor.
     * @param $endpoint
     * @param array $payload
     * @param array $headers
     * @param string $method
     * @param bool $debug
     */
    public function __construct(

        $endpoint,

        array $payload,

        array $headers,

        $method = "POST",

        $debug = false

    ){

        $this->_debug = $debug;

            // set location
            $location = $endpoint;

        // So Code-Alchemy can treat the POST as though it were a PUT
        if ( $method == 'PUT') $payload['_PARNASSUS_SIMULATE_PUT'] = 1;

            // encode it
            $content = json_encode($payload);

            $contentType = "application/json";

            $contentDigest = sha1($content);

            $contentSize = sizeof($content);

            //CURL stuff
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            curl_setopt($ch, CURLOPT_URL, $location);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            curl_setopt($ch, CURLOPT_VERBOSE, 0);

            curl_setopt($ch, CURLOPT_HEADER, 1);

            if ( $method == 'POST'){

                curl_setopt($ch, CURLOPT_POST, $method == 'POST'?1:0);

                curl_setopt($ch, CURLOPT_POSTFIELDS, $content);

            }

        if ( $method == 'PUT'){

            curl_setopt($ch, CURLOPT_POST, 1);

            curl_setopt($ch, CURLOPT_POSTFIELDS, $content);

        }

        if ( $method == 'GET')

            $location .= (string) new URI_Request_String($payload);

        if ( $method == 'DELETE')

            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

            //This guy does the job
            $output = curl_exec($ch);

            //echo curl_error($ch);
            $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);

            $header = substr($output, 0, $header_size);

            $body = substr($output, $header_size);

            curl_close($ch);

        $this->data = array(

            'header' => $header,

            'body' => $body,

            'method' => $method,

            'location' => $location

        );

    }

    /**
     * @return cURL_Call_Result
     */
    public function result(){

        return new cURL_Call_Result( $this->data );


    }

}