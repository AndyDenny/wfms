<?php

interface I3D{

    const TEST2 = 'test interface';
    

    public function test();
    // реализация методов в интерфейсах должна отсутствовать
    // она происходит в классе-"наследнике"
}