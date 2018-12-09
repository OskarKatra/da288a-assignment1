    <?php

    class Unicorn
    {
        var $name;
        var $id;
        var $spottedBy;
        var $spottedWhere;
        var $description;
        var $image;

        /**
         * Unicorn constructor.
         * @param $id
         * @param $name
         */
        function __construct($id, $name) {
            $this->name = $name;
            $this->id = $id;
        }

        /**
         * Set detailed information
         * @param $spottedBy
         * @param $spottedWhere
         * @param $description
         * @param $image
         */
        function setDetailedInfo($spottedBy, $spottedWhere, $description, $image){
            $this->spottedBy = $spottedBy;
            $this->spottedWhere = $spottedWhere;
            $this->description = $description;
            $this->image = $image;
        }

        /**
         * Return simple information about unicorn
         * @return string
         */
        public function printUnicornSimple(){
            return
            "
                <div class=\"col-lg-3 col-md-6 mb-4\">
                  <div class=\"card\">
                    <div class=\"card-body\">
                      <h4 class=\"card-title\">$this->name</h4>
                    </div>
                    <div class=\"card-footer\">
                      <a href=/?id=$this->id class=\"btn btn-primary\">Läs mer</a>
                    </div>
                  </div>
                </div>    
             ";
        }

        /**
         * Return detailed information about unicorn
         * @return string
         */
        public function printUnicornDetailed(){
            return "
        <div class=\"col-lg-3 col-md-6 mb-4\"></div>
        <div class=\"col-lg-6 col-md-6 mb-4\">
                  <div class=\"card\">
                  <img class=\"card-img-top\" src=$this->image alt=\"\">
                    <div class=\"card-body\">
                      <h5 class=\"card-title\">$this->name</h5>
                      <p class=\"card-text\">$this->description</p>
                      <p class=\"card-text\">Rapporterad av: $this->spottedBy</p>
                      <p class=\"card-text\">Ort: $this->spottedWhere</p>
                    </div>
                  </div>
                </div>
                <div class=\"col-lg-3 col-md-6 mb-4\"></div>
                ";
        }
    }
