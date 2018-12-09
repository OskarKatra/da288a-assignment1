    <?php
    require("vendor/autoload.php");
    require("./Unicorn.php");

    use GuzzleHttp\Client;

    class Api
    {
        const base_path = 'http://localhost:8080/?id=';
        const base_uri = 'http://unicorns.idioti.se';
        const headers = ['Accept' => 'application/json'];

        /**
         * @param $param
         * @return mixed
         * @throws \GuzzleHttp\Exception\GuzzleException
         */
        function getData($param){
            $client = new Client(['headers' => self::headers, 'base_uri' => self::base_uri]);

            $res = $client->request('GET', $param);
            $data = json_decode($res->getBody());
            $unicorn_data = self::formatData($data);

            return $unicorn_data;
        }

        /**
         * @param $data
         * @return array
         */
        function formatData($data){
            $array = array();

            if(is_array($data)){
                foreach ($data as $item){
                    $unicorn = new Unicorn(
                        $item->id,
                        $item->name
                    );
                    array_push($array, $unicorn);
                }
            }

            if(is_object($data)){
                $unicorn = new Unicorn(
                    $data->id,
                    $data->name
                );

                $unicorn -> setDetailedInfo(
                    $data->reportedBy,
                    $data->spottedWhere->name,
                    $data->description,
                    $data->image);

                array_push($array, $unicorn);
            }

            return $array;
        }
    }