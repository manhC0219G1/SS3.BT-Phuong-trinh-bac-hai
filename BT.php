<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    <input type="text" name="txt1">
    <input type="text" name="txt2">
    <input type="text" name="txt3">
    <input type="submit" name="Calculator">
</form>
<?php

class QuadraticEquation
{
    public $a;
    public $b;
    public $c;

    public function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    function getA()
    {
        return $this->a;
    }

    function getB()
    {
        return $this->b;
    }

    function getC()
    {
        return $this->c;
    }

    function getDiscriminant()
    {
        $delta = ($this->b * $this->b - 4 * $this->a * $this->c);
        return $delta;
    }

    function getRoot1()
    {
        $root1 = -$this->b + pow($this->getDiscriminant(), 0.5) / (2 * $this->a);
        return $root1;
    }

    function getRoot2()
    {
        $root2 = -$this->b - pow($this->getDiscriminant(), 0.5) / (2 * $this->a);
        return $root2;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST["txt1"];
    $b = $_POST["txt2"];
    $c = $_POST["txt3"];
    $quadrati = new QuadraticEquation($a, $b, $c);
    if (!empty($a) && !empty($b) && !empty($c)) {
        if ($quadrati->getDiscriminant() > 0) {
            echo "The equation has : " . $quadrati->getRoot1() . "<br>";
            echo "The equation has : " . $quadrati->getRoot2();
        }
        if ($quadrati->getDiscriminant() == 0) {
            echo "The equation has : " . $quadrati->getRoot1();
        }
        if ($quadrati->getDiscriminant() < 0) {
            echo "The equation has no roots ";
        }
    } else {
        echo "Enter the number";
    }
}


?>

</body>
</html>