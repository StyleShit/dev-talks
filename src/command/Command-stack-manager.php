<?php

require_once 'interfaces\command-stack-interface.php';
class CommandStackManager implements CommandStackInterface
{
	private $commands ;


	public function __construct()
	{
		$this->commands =  new CommandList();
	}

	/**
	 * @throws Exception
	 */
	public function execute(CommandInterface $command)
	{
		try {
			$command->run();
			$this->commands->add($command);

		} catch (Exception $e) {
			echo "Exception in CommandStack";
		}


	}

	public function undo()
	{
		$last_command =$this->commands->pop();
		$last_command->undo();


	}
}