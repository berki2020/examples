<?php

namespace ImportExport;

interface Reader
{
    public function read(): array;
}

interface Writer
{
    public function  write(array $data);
}

interface Converter
{
    public function convert($item);
}

class ArrayReader implements Reader
{
    private $inputArray;

    public function __construct($inputArray)
    {
        $this->inputArray = $inputArray;
    }

    public function read(): array
    {
        return $this->inputArray;
    }
}

class FileReader implements Reader
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function read(): array
    {
        return file($this->path);
    }
}

class ArrayWriter implements Writer
{
    public function write(array $data)
    {
        return $data;
    }
}

class FileWriter implements Writer
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function write(array $data)
    {
        foreach ($data as $string) {
            $file = fopen($this->path, 'a');
            fwrite($file, $string);
        }
        fclose($file);
    }
}

class AnyConverter implements Converter
{
    public function convert($item)
    {
        return strtoupper($item);
    }
}

class AnyConverter2 implements Converter
{
    public function convert($item)
    {
        return $item . '!';
    }
}

class Import
{
    private $reader;
    private $writer;
    private $converters = [];

    public function from(Reader $reader)
    {
        $this->reader = $reader;
        return $this;
    }

    public function to(Writer $writer)
    {
        $this->writer = $writer;
        return $this;
    }

    public function with(Converter $converter)
    {
        $this->converters[] = $converter;
        return $this;
    }

    public function execute()
    {
        $data = $this->reader->read();
        $result = [];
        foreach ($data as $item) {
            foreach ($this->converters as $converter) {
                $item = $converter->convert($item);
            }
            $result[] = $item;
        }

        return $this->writer->write($result);
    }
}

$import = new Import();
$result = $import->from(new FileReader($_SERVER['DOCUMENT_ROOT'] . '/oop/level3/task_4.php'))->to(new ArrayWriter())->with(new AnyConverter())->with(new AnyConverter2())->execute();
//$import->from(new FileReader('E://2.txt'))->to(new FileWriter('E://3.txt'))->with(new AnyConverter())->execute();
echo '<pre>';
var_dump($result);
