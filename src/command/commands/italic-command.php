<?php

require_once "src/command/interfaces/command-Interface.php";

class ItalicCommand implements CommandInterface
{

	private $text;
	private $output;

	public function __construct($text, $output)
	{
		$this->text = "<i>". $text ."<i>";
		$this->output = $output;
	}

	public function do()
	{
		$this->output->add($this->text);
	}

	public function undo()
	{
		$this->output->remove($this->text);
	}
}