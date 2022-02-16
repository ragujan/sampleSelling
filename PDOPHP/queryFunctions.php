<?php
require "connectDB.php";

class queryFunctions extends DBh
{

    public $testFeatchArray;
    private $numrows;
    public $allowedpages;
    public $totalcount;

    public $subSamplesQuery = "SELECT * FROM samples 
    INNER JOIN subsampletype
    ON subsampletype.subsampleID =samples.SubsampleID
    INNER JOIN sampletype
    ON sampletype.sampleTypeID = subsampletype.sampleTypeID
    INNER JOIN sampleaudio
    ON sampleaudio.sampleID=samples.sampleID
    INNER JOIN sampleimages
    ON sampleimages.sampleID=samples.sampleID";

    public $sampleTypeQuery = "SELECT * FROM samples 
    INNER JOIN subsampletype
    ON subsampletype.subsampleID =samples.SubsampleID
    INNER JOIN sampletype
    ON sampletype.sampleTypeID = subsampletype.sampleTypeID
    INNER JOIN sampleaudio
    ON sampleaudio.sampleID=samples.sampleID
    INNER JOIN sampleimages
    ON sampleimages.sampleID=samples.sampleID"; 

    public $sampleTypePages = "SELECT * FROM samples 
    INNER JOIN subsampletype
    ON subsampletype.subsampleID =samples.SubsampleID
    INNER JOIN sampletype
    ON sampletype.sampleTypeID = subsampletype.sampleTypeID
    INNER JOIN sampleaudio
    ON sampleaudio.sampleID=samples.sampleID
    INNER JOIN sampleimages
    ON sampleimages.sampleID=samples.sampleID";


    public function getSamples()
    {
        $index = 0;
        $statement = $this->connect()->query("SELECT * FROM samples");
        $this->numrows = $statement->rowCount();
        return $statement->fetchAll();
    }

    public function subSampleType($id, $PG)
    {
        $cal =  $this->subSamplesQuery . "" . "WHERE subsampletype.subsampleID = ?;";

        $statement1 = $this->connect()->prepare($cal);
        $statement1->execute([$id]);
        $this -> totalcount = count($statement1->fetchAll());
        if ($this -> totalcount == 0) {
            $this->fetcharray = array("Nothing");
            return $this->fetcharray;
        } else {
            // echo count($statement1->fetchAll());
            $totalPages = ceil($this -> totalcount / 4);

            if ($PG >= $totalPages) {
                $PG = $totalPages;
            } else if ($PG <= 0) {
                $PG = 0;
            }

            $sql = $this->subSamplesQuery . "" ."WHERE subsampletype.subsampleID = ? LIMIT 4 OFFSET $PG  ";

            $statement2 = $this->connect()->prepare($sql);
            $statement2->execute([$id]);

            return $statement2->fetchAll();
        }
    }

    public function subSampleTypePages($id)
    {
        $cal =  $this->subSamplesQuery . "" . "WHERE subsampletype.subsampleID = ?;";

        $statement1 = $this->connect()->prepare($cal);
        $statement1->execute([$id]);
        $this -> totalcount = count($statement1->fetchAll());
        if ($this -> totalcount == 0) {
            $this->fetcharray = array("Nothing");
            return 0;
        } else {
            // echo count($statement1->fetchAll());
            $totalPages = ceil($this -> totalcount / 4);
            return $totalPages;
        }
    }

    public function sampleType($id, $PG)
    {
        $cal =  $this->sampleTypeQuery." "."WHERE sampletype.sampleTypeID = ?;";

        $statement1 = $this->connect()->prepare($cal);
        $statement1->execute([$id]);
        $this -> totalcount = count($statement1->fetchAll());
        if ($this -> totalcount == 0) {
            $this->fetcharray = array("Nothing");
            return $this->fetcharray;
        } else {
            // echo count($statement1->fetchAll());
            $totalPages = ceil($this -> totalcount / 4);

            if ($PG >= $totalPages) {
                $PG = $totalPages;
            } else if ($PG <= 0) {
                $PG = 0;
            }

            $sql = $this->sampleTypeQuery." "."WHERE sampletype.sampleTypeID = ? LIMIT 4 OFFSET $PG  ";

            $statement2 = $this->connect()->prepare($sql);
            $statement2->execute([$id]);

            return $statement2->fetchAll();
        }
    }

    public function sampleTypePages($id)
    {
        $cal =  $this ->sampleTypePages." "."WHERE sampletype.sampleTypeID = ?;";

        $statement1 = $this->connect()->prepare($cal);
        $statement1->execute([$id]);
        $this -> totalcount = count($statement1->fetchAll());
        if ($this -> totalcount == 0) {
            $this->fetcharray = array("Nothing");
            return 0;
        } else {
            // echo count($statement1->fetchAll());
            $totalPages = ceil($this -> totalcount / 4);
            return $totalPages;
        }
    }

    public function returnTotalCount(){
        return $this -> totalcount;
    }

}
