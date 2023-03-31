<?php

class Donation
{
    public static int $totalDonated = 0;
    public static int $numberOfDonors = 0;
    private string $name;
    private float $amount;

    public function __construct(string $name, float $amount)
    {
        $this->name = $name;
        $this->amount = $amount;
        self::$totalDonated += $amount;
        self::$numberOfDonors++;
    }

    public function info(): string
    {
        $precision = 2;
        $percent = $this->amount / static::$totalDonated * 100;
        return $this->name . " donated " . $this->amount . " (" . round($percent, $precision) . ")";
    }
}

$donors = [
    new Donation("Nikola", 85.00),
    new Donation("Mitko", 50.00),
    new Donation("Emily", 90.00),
    new Donation("Iliana", 65.00),
];

foreach ($donors as $donor) {
    echo $donor->info() . "<br>";
}

$total = Donation::$totalDonated;
$number = Donation::$numberOfDonors;
echo "Total Donations  = $total<br>";
echo "Number of Donors = $number";
