<?php
class Empresa{
    private $id;
    private $company;
    private $investment;
    private $date;
    private $active;
    public function __construct($id,$company,$investment,$date,$active,){
        $this->id = $id;
        $this->company = $company;
        $this->investment = $investment;
        $this->date = $date;
        $this->active = $active;

    }

	public function getId(){
		return $this->id;
	}
	public function getCompany(){
		return $this->company;
	}
	public function getInvestment(){
		return $this->investment;
	}
	public function getDate(){
		return $this->date;
	}
	public function getActive(){
		return $this->active;
	}



    
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }


    public function setCompany($company): self
    {
        $this->company = $company;

        return $this;
    }

    public function setInvestment($investment): self
    {
        $this->investment = $investment;

        return $this;
    }

    public function setDate($date): self
    {
        $this->date = $date;

        return $this;
    }

    public function setActive($active): self
    {
        $this->active = $active;

        return $this;
    }
}


?>