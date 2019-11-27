<?php
namespace App\Filters;
use App\Filters\Exception\FilterException;
use Illuminate\Support\Str;

trait FilterTrait
{

    /**
     * Create filter
     *
     * @param $name
     * @return string
     * @throws FilterException
     */
    public function createFilterDecorator($name)
    {
        $this->existsPath();

        return $this->pathFilter . Str::studly($name);
    }

    /**
     * Check pathFilter exists
     *
     * @throws FilterException
     */
    private function existsPath()
    {
        if (!$this->pathFilter) {
            throw new FilterException('Please set the $pathFilter property to your filter path.');
        }
    }

    /**
     * Check decorator
     *
     * @param $decorator
     * @return bool
     */
    public function isValidDecorator($decorator)
    {
        return class_exists($decorator);
    }

    /**
     * Search
     *
     * @param $query
     * @param array $params
     * @return mixed
     * @throws FilterException
     */
    public function search($query, array $params)
    {
        foreach ($params as $filterName => $value) {
            $decorator = $this->createFilterDecorator($filterName);

            if ($this->isValidDecorator($decorator)) {
                $query = $decorator::apply($query, $value);
            }
        }
        return $query;
    }
}
