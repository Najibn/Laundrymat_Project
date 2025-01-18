<?php

class Laundromat {
    private array  $machines  = [];
    private array  $customers = [];

    //add machine
    public function addMachine(LaundryMachine $machine): void {
        $this->machines[] = $machine;
    }
    //add customer
    public function addCustomer(Customer $customer): void {
        $this->customers[] = $customer;
    }

    //machine assigning  checkif to see if you can return a string 
    public function assignMachineToCustomer(Customer $customer, LaundryMachine $machine): bool {
        if ($machine->getStatus() === MachineStatus::AVAILABLE ) {
            $machine->startCycle();
            return true; 
        }
        return false;
    }

    //calculate price according to the load(kg)
    public function calculatePrice(Customer $customer, LaundryMachine $machine): float {
        $loadWeight   = $customer->getLoadWeight();
        $pricePerLoad = $machine->getPricePerLoad();
        $capacity     = $machine->getCapacity()->value;
        $loadsNum = ceil($loadWeight / $capacity);
        $finalprice = $loadsNum * $pricePerLoad;
        return $finalprice;
    }

    public function listAvailableMachines(): array {
        $availableMachines = [];
        foreach ($this->machines as $machine) {
            if ($machine->getStatus() === MachineStatus::AVAILABLE) {
                $availableMachines[] = $machine;
            }
        }
        return $availableMachines;
    }
}
?>
