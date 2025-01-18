<?php
require "Laundrymat.php";
require "LaundryMachine.php";
require "Customer.php";
require_once "enumMachineStatus.php";
require "enumMachineType.php";
require "enumMachineCapacity.php";

$laundromat = new Laundromat();

//$machineId,$pricePerLoad,$status,$type,$Capacity
$washer = new LaundryMachine(1, MachineType::WASHER, MachineCapacity::MEDIUM, 7.00); 
$dryer = new LaundryMachine(2, MachineType::DRYER, MachineCapacity::MEDIUM, 4.00);

$laundromat->addMachine($washer);
$laundromat->addMachine($dryer);

// String $name float $loadWeight
$customer = new Customer("sant jordi", 6);     

$laundromat->addCustomer($customer);

if ($laundromat->assignMachineToCustomer($customer, $washer)) {
    $price = $laundromat->calculatePrice($customer, $washer);
    echo "Customer Name: " . $customer->getName() .PHP_EOL .
         " Cost Of Service: $" . $price . PHP_EOL;
} else {
    echo "Unable to assign machine to customer.\n";
}

echo  "***Available machines***".PHP_EOL;
foreach ($laundromat->listAvailableMachines() as $machine) {
    echo "Machine ID: ". $machine->getMachineId() . PHP_EOL .
         "Machine Type: ". $machine->getType()->value . PHP_EOL.
         "Machine Capacity: ". $machine->getCapacity()->value . PHP_EOL;
}

?>
