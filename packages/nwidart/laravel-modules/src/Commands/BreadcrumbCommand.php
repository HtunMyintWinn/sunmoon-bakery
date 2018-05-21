<?php

namespace Nwidart\Modules\Commands;

use Nwidart\Modules\Support\Stub;
use Nwidart\Modules\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class BreadcrumbCommand extends GeneratorCommand
{
    use ModuleCommandTrait;

    /**
     * The name of argument being used.
     *
     * @var string
     */
    protected $argumentName = 'breadcrumb';

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'module:make-breadcrumb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate new breadcrumb for the specified module.';

    /**
     * Get controller name.
     *
     * @return string
     */
    public function getDestinationFilePath()
    {
        $path = $this->laravel['modules']->getModulePath($this->getModuleName());

        $breadcrumbPath = $this->laravel['modules']->config('paths.generator.breadcrumb');

        return $path . $breadcrumbPath . '/' . $this->getBreadcrumbName() . '.php';
    }

    /**
     * @return string
     */
    protected function getTemplateContents()
    {
        $module = $this->laravel['modules']->findOrFail($this->getModuleName());

        return (new Stub('/breadcrumb.stub', [
            'LOWER_NAME'        => $module->getLowerName(),
        ]))->render();
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
            array('breadcrumb', InputArgument::REQUIRED, 'The name of the controller class.'),
            array('module', InputArgument::OPTIONAL, 'The name of module will be used.'),
        );
    }


    /**
     * @return array|string
     */
    protected function getBreadcrumbName()
    {
        $breadcrumb = studly_case($this->argument('breadcrumb'));

        if (str_contains(strtolower($breadcrumb), 'breadcrumb') === false) {
            $breadcrumb .= 'Breadcrumb';
        }

        return $breadcrumb;
    }

}
