<?php
namespace App\Http\Controllers\Api\V1;

use App\Exceptions\NationTypeNotFound;
use App\Http\Controllers\Api\ApiController;
use App\Repository\NationRepository;
use Illuminate\Http\Request;

class NationController extends ApiController
{
    private $nationRepository;

    const NATION_TYPE = 1;
    const CITY_TYPE = 2;
    const DISTRICT_TYPE = 3;
    const COMMUNE_TYPE = 4;

    public function __construct(NationRepository $nationRepository)
    {
        $this->nationRepository = $nationRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws NationTypeNotFound
     */
    public function info(Request $request)
    {
        $types = [
          self::NATION_TYPE,
          self::CITY_TYPE,
          self::DISTRICT_TYPE,
          self::COMMUNE_TYPE
        ];
        if (empty($request->code) || empty($request->type) || !in_array($request->type, $types)) {
            throw new NationTypeNotFound('nation_type_or_code_not_found');
        }

        switch ($request->type) {
            case self::NATION_TYPE:
                return $this->success($this->nationRepository->nationInfo($request->code));
            case self::CITY_TYPE:
                return $this->success($this->nationRepository->cityInfo($request->code));
            case self::DISTRICT_TYPE:
                return $this->success($this->nationRepository->districtInfo($request->code));
            case self::COMMUNE_TYPE:
                return $this->success($this->nationRepository->communeInfo($request->code));
            default:
                throw new NationTypeNotFound('nation_type_or_code_not_found');
        }
    }
}
