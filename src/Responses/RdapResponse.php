<?php

namespace Metaregistrar\RDAP\Responses;

use Metaregistrar\RDAP\Data\RdapConformance;
use Metaregistrar\RDAP\Data\RdapEntity;
use Metaregistrar\RDAP\Data\RdapEvent;
use Metaregistrar\RDAP\Data\RdapLink;
use Metaregistrar\RDAP\Data\RdapNameserver;
use Metaregistrar\RDAP\Data\RdapNotice;
use Metaregistrar\RDAP\Data\RdapObject;
use Metaregistrar\RDAP\Data\RdapPort43;
use Metaregistrar\RDAP\Data\RdapRemark;
use Metaregistrar\RDAP\Data\RdapSecureDNS;
use Metaregistrar\RDAP\Data\RdapStatus;
use Metaregistrar\RDAP\RdapException;

class RdapResponse {
    /**
     * @var string|null
     */
    protected $objectClassName = null;
    /**
     * @var string|null
     */
    protected $ldhName = null;
    /**
     * @var string
     */
    protected $handle;
    /*
    * @var  string
    */
    protected $name;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var null|RdapConformance[]
     */
    protected $rdapConformance = null;
    /**
     * @var null|RdapEntity[]
     */
    protected $entities = null;
    /**
     * @var null|RdapLink[]
     */
    protected $links = null;
    /**
     * @var null|RdapRemark[]
     */
    protected $remarks = null;
    /**
     * @var null|RdapNotice[]
     */
    protected $notices = null;
    /**
     * @var null|RdapEvent[]
     */
    protected $events = null;
    /**
     * @var null|RdapPort43[]
     */
    protected $port43;
    /**
     * @var null|RdapNameserver[]
     */
    protected $nameservers = null;
    /**
     * @var null|RdapStatus[]
     */
    protected $status = null;
    /**
     * @var null|RdapSecureDNS[]
     */
    protected $secureDNS = null;

    /**
     * RdapResponse constructor.
     *
     * @param string $json
     *
     * @throws \Metaregistrar\RDAP\RdapException
     */
    public function __construct(string $json) {
        if ($data = json_decode($json, true)) {
            foreach ($data as $key => $value) {
                if (is_array($value)) {
                    // $value is an array
                    foreach ($value as $k => $v) {
                        $this->{$key}[] = RdapObject::KeyToObject($key, $v);
                    }
                } else {
                    // $value is not an array, just create a var with this value (startAddress endAddress ipVersion etc etc)
                    $this->{$key} = $value;
                }
            }
        } else {
            throw new RdapException('Response object could not be validated as proper JSON');
        }
    }

    /**
     * @return string
     */
    public function getHandle(): string {
        return $this->handle;
    }

    /**
     * @return RdapConformance[]|null
     */
    public function getConformance(): ?array {
        return $this->rdapConformance;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * @return RdapEntity[]|null
     */
    public function getEntities(): ?array {
        return $this->entities;
    }

    /**
     * @return RdapLink[]|null
     */
    public function getLinks(): ?array {
        return $this->links;
    }

    /**
     * @return RdapRemark[]|null
     */
    public function getRemarks(): ?array {
        return $this->remarks;
    }

    /**
     * @return RdapNotice[]|null
     */
    public function getNotices(): ?array {
        return $this->notices;
    }

    /**
     * @return string
     */
    public function getPort43(): string {
        return $this->port43;
    }

    /**
     * @return RdapNameserver[]|null
     */
    public function getNameservers(): ?array {
        return $this->nameservers;
    }

    /**
     * @return RdapStatus[]|null
     */
    public function getStatus(): ?array {
        return $this->status;
    }

    /**
     * @return RdapEvent[]|null
     */
    public function getEvents(): ?array {
        return $this->events;
    }

    /**
     * @return string|null
     */
    public function getClassname(): ?string {
        return $this->objectClassName;
    }

    /**
     * @return string|null
     */
    public function getLDHName(): ?string {
        return $this->ldhName;
    }

    /**
     * @return RdapSecureDNS[]|null
     */
    public function getSecureDNS(): ?array {
        return $this->secureDNS;
    }
}
