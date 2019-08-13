<?php

namespace Metaregistrar\RDAP\Data;

class RdapConformance extends RdapObject {
    protected $rdapConformance;

    public function dumpContents() {
        echo '- ' . $this->getRdapConformance() . "\n";
    }

    /**
     * @return mixed
     */
    public function getRdapConformance() {
        return $this->rdapConformance;
    }

    /**
     * @param mixed $rdapConformance
     */
    public function setRdapConformance($rdapConformance) {
        $this->rdapConformance = $rdapConformance;
    }
}
