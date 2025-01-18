<?php

class LaundryMachine {
    private int             $machineId;
    private float           $pricePerLoad;
    private MachineStatus   $status;                         //available, inuse, outoforder                               
    private MachineType     $type;                          //washer or dryer (..try boolean later)
    private MachineCapacity $Capacity;                     //load capacity eg 6,7,8kg,9 or 10kg
    
    public function __construct(int $machineId,MachineType $type,MachineCapacity $Capacity,float $pricePerLoad) {
        $this->machineId    = $machineId;
        $this->pricePerLoad = $pricePerLoad;
        $this->status       = MachineStatus::AVAILABLE;
        $this->type         = $type;                          // $this->type= false;
        $this->capacity     = $Capacity;
    }

    // Getters and setters
  public function getMachineId(): int{ 
    return $this->machineId;
  }
  public function getType(): MachineType {
    return $this->type; 
  }
  public function getCapacity():MachineCapacity{ 
    return $this->capacity; 
  }
  public function getPricePerLoad():float {
    return $this->pricePerLoad; 
  }
  public function getStatus():MachineStatus{
    return $this->status; 
 }

    //machine start method
    public function startCycle() :string{
        if ($this->status == MachineStatus::AVAILABLE) {
            $this->status = MachineStatus::INUSE;
            $notice = "Machine:  {$this->machineId} has started!" .PHP_EOL; 
        }else {
            $notice = " machine: {$this->machineId} is not available!".PHP_EOL;
        }

       return $notice .PHP_EOL;
       
    }

    //machine stop method
    public function endCycle(): string{
        if ($this->status == MachineStatus::INUSE) {
            $this->status = MachineStatus::AVAILABLE;
            $notice =  "Machine: {$this->machineId} has stopped!".PHP_EOL;   
        }else {
          $notice =  "Machine: {$this->machineId} is not in use!".PHP_EOL;
        }

        return  $notice;
    }

}

?>