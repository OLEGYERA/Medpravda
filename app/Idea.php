<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class Idea
 * @package Fresh\Medpravda
 * @property string title
 * @property string slug
 * @property string url
 * @property string utm_source
 * @property string utm_medium
 * @property string utm_campaign
 * @property string utm_content
 * @property integer banner_click
 * @property string start_company
 * @property string stop
 * @property boolean approved
 * @property boolean banner
 * @property integer scenario_id
 */
class Idea extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'href_id',
        'url',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_content',
        'transition',
        'clicked',
        'banner_click',
        'start',
        'stop',
        'approved',
        'stoped',
//        'banner',
        'filename',
        'click_ratio',
        'scenario_id'
    ];


    public function scenario()
    {
        return $this->belongsTo(Scenario::class)->withDefault(null);
    }

    /**
     * @param $fields
     */
    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    /**
     * @param string $start Start-day
     * @param integer $transition Count of transitions
     * @return bool
     */
    public static function opportunityCheck($start, $transition, $stop)
    {
        $stop = Carbon::parse($stop)->endOfMonth();
        $start = Carbon::parse($start)->addHours(12);

        $diff = $stop->diffInMinutes($start);

        if ($diff > $transition) {
            return false;
        }
        return $diff - 5;
    }

    /**
     * @param $value
     */
    public function toggleApproved($value)
    {
        if (1 != $value) {
            return $this->setPause();
        }

        return $this->setStartCompany();
    }

    /**
     *
     */
    public function setStartCompany()
    {
        $this->approved = 1;

        $this->save();
    }

    /**
     *
     */
    public function setPause()
    {
        $this->approved = 0;

        $this->save();
    }

    /**
     * @param $value
     */
    public function toggleBanner($value)
    {
        if (1 != $value) {
            return $this->stopBanner();
        }

        return $this->startBanner();
    }

    /**
     *
     */
    public function startBanner()
    {
        $this->banner = 1;
        $this->save();
    }

    /**
     *
     */
    public function stopBanner()
    {
        $this->banner = 0;
        $this->save();
    }

    public function setStopAttribute($value)
    {
        $this->attributes['stop'] = Carbon::parse($value)->endOfDay();
    }

    public function setStartAttribute($value)
    {
        $this->attributes['start'] = Carbon::parse($value)->startOfDay();
    }

    public function getStopAttribute($value)
    {
        return Carbon::parse($value);
    }

    public function getStartAttribute($value)
    {
        return Carbon::parse($value);
    }

    public static function getActive()
    {
        $ideas = new static;

        $where = [
            ['approved', 1],
            ['stoped', 0],
            ['start', '>=', date('Y-m-01')],
            ['stop', '<=', date('Y-m-t 23:59:59')],
        ];
        return $ideas->where($where)->get();
    }

    public function getUtmAttribute()
    {
        $utm = '?';
        if (null != $this->utm_source) {
            $utm .= 'utm_source=' . $this->utm_source . '&';
        }
        if (null != $this->utm_medium) {
            $utm .= 'utm_medium=' . $this->utm_medium . '&';
        }
        if (null != $this->utm_campaign) {
            $utm .= 'utm_campaign=' . $this->utm_campaign . '&';
        }
        if (null != $this->utm_content) {
            $utm .= 'utm_content=' . $this->utm_content;
        }


        return $utm;
    }

    public function getBannerIdAttribute()
    {
        switch ($this->banner) {
            case 1:
                return 'banners011';
            case 2:
                return 'banners022';
            case 3:
                return 'banners033';
            default:
                return false;

        }
    }
}