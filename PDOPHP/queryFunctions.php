<?php
require "connectDB.php";

class queryFunctions extends DBh
{

    public $testFeatchArray;
    private $numrows;
    public $allowedpages;
    public $totalcount;
    public $fetcharray;

    private $subSamplesQuery = "SELECT * FROM samples 
    INNER JOIN subsampletype
    ON subsampletype.subsampleID =samples.SubsampleID
    INNER JOIN sampletype
    ON sampletype.sampleTypeID = subsampletype.sampleTypeID
    INNER JOIN sampleaudio
    ON sampleaudio.sampleID=samples.sampleID
    INNER JOIN sampleimages
    ON sampleimages.sampleID=samples.sampleID";

    private $sampleTypeQuery = "SELECT * FROM samples 
    INNER JOIN subsampletype
    ON subsampletype.subsampleID =samples.SubsampleID
    INNER JOIN sampletype
    ON sampletype.sampleTypeID = subsampletype.sampleTypeID
    INNER JOIN sampleaudio
    ON sampleaudio.sampleID=samples.sampleID
    INNER JOIN sampleimages
    ON sampleimages.sampleID=samples.sampleID";

    public function subSampleType($id, $PG)
    {
        $cal =  $this->subSamplesQuery . " " . "WHERE subsampletype.subsampleID = ?;";

        $statement1 = $this->connect()->prepare($cal);
        $statement1->execute([$id]);
        $this->totalcount = count($statement1->fetchAll());
        if ($this->totalcount == 0) {
            $this->fetcharray = array("Nothing");
            return $this->fetcharray;
        } else {          
            $totalPages = ceil($this->totalcount / 2);

            if ($PG >= ($totalPages - 1) * 2) {
                $PG = ($totalPages - 1) * 2;
            } else if ($PG <= 0) {
                $PG = 0;
            }

            $sql = $this->subSamplesQuery . " " . "WHERE subsampletype.subsampleID = ? LIMIT 2 OFFSET $PG  ";

            $statement2 = $this->connect()->prepare($sql);
            $statement2->execute([$id]);

            return $statement2->fetchAll();
        }
    }

    public function subSampleTypePages($id)
    {
        $cal =  $this->subSamplesQuery . " " . "WHERE subsampletype.subsampleID = ?;";

        $statement1 = $this->connect()->prepare($cal);
        $statement1->execute([$id]);
        $this->totalcount = count($statement1->fetchAll());
        if ($this->totalcount == 0) {
            $this->fetcharray = array("Nothing");
            return 0;
        } else {
            // echo count($statement1->fetchAll());
            $totalPages = (ceil($this->totalcount / 2) - 1);
            return $totalPages;
        }
    }

    public function sampleType($id, $PG)
    {
        $cal =  $this->sampleTypeQuery . " " . "WHERE sampletype.sampleTypeID = ?;";

        $statement1 = $this->connect()->prepare($cal);
        $statement1->execute([$id]);
        $this->totalcount = count($statement1->fetchAll());
        if ($this->totalcount == 0) {
            $this->fetcharray = array("Nothing");
            return $this->fetcharray;
        } else {
            // echo count($statement1->fetchAll());
            $totalPages = ceil($this->totalcount / 2);

            if ($PG >= ($totalPages - 1) * 2) {
                $PG = ($totalPages - 1) * 2;
            } else if ($PG <= 0) {
                $PG = 0;
            }


            $sql = $this->sampleTypeQuery . " " . "WHERE sampletype.sampleTypeID = ? LIMIT 2 OFFSET $PG  ";

            $statement2 = $this->connect()->prepare($sql);
            $statement2->execute([$id]);

            return $statement2->fetchAll();
        }
    }

    public function sampleTypePages($id)
    {
        $cal =  $this->sampleTypeQuery . " " . "WHERE sampletype.sampleTypeID = ?;";

        $statement1 = $this->connect()->prepare($cal);
        $statement1->execute([$id]);
        $this->totalcount = count($statement1->fetchAll());
        if ($this->totalcount == 0) {
            $this->fetcharray = array("Nothing");
            return 0;
        } else {
            // echo count($statement1->fetchAll());
            $totalPages = (ceil($this->totalcount / 2) - 1);
            return $totalPages;
        }
    }

    public function returnTotalCount()
    {
        return $this->totalcount;
    }
}
