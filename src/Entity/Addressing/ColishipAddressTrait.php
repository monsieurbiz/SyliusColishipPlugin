<?php

/*
 * This file is part of Monsieur Biz's Sylius Coliship Plugin for Sylius.
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusColishipPlugin\Entity\Addressing;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait ColishipAddressTrait
{
    /**
     * @ORM\Column(type="string", length=35, nullable=true)
     *
     * @Assert\Length(max=35, groups={"mbiz_coliship", "sylius_shipping_address_update"})
     */
    #[ORM\Column(type: 'string', length: 35, nullable: true)]
    #[Assert\Length(max: 35, groups: ['mbiz_coliship', 'sylius_shipping_address_update'])]
    protected ?string $service = null;

    /**
     * @ORM\Column(type="string", length=35, nullable=true)
     *
     * @Assert\Length(max=35, groups={"mbiz_coliship", "sylius_shipping_address_update"})
     */
    #[ORM\Column(type: 'string', length: 35, nullable: true)]
    #[Assert\Length(max: 35, groups: ['mbiz_coliship', 'sylius_shipping_address_update'])]
    protected ?string $entrance = null;

    /**
     * @ORM\Column(type="string", length=35, nullable=true)
     *
     * @Assert\Length(max=35, groups={"mbiz_coliship", "sylius_shipping_address_update"})
     */
    #[ORM\Column(type: 'string', length: 35, nullable: true)]
    #[Assert\Length(max: 35, groups: ['mbiz_coliship', 'sylius_shipping_address_update'])]
    protected ?string $locality = null;

    /**
     * @ORM\Column(type="string", length=35, nullable=true)
     *
     * @Assert\Length(max=35, groups={"mbiz_coliship", "sylius_shipping_address_update"})
     */
    #[ORM\Column(type: 'string', length: 35, nullable: true)]
    #[Assert\Length(max: 35, groups: ['mbiz_coliship', 'sylius_shipping_address_update'])]
    protected ?string $floor = null;

    /**
     * @ORM\Column(name="door_code1", type="string", length=8, nullable=true)
     *
     * @Assert\Length(max=8, groups={"mbiz_coliship", "sylius_shipping_address_update"})
     */
    #[ORM\Column(name: 'door_code1', type: 'string', length: 8, nullable: true)]
    #[Assert\Length(max: 8, groups: ['mbiz_coliship', 'sylius_shipping_address_update'])]
    protected ?string $doorCode1 = null;

    /**
     * @ORM\Column(name="door_code2", type="string", length=8, nullable=true)
     *
     * @Assert\Length(max=8, groups={"mbiz_coliship", "sylius_shipping_address_update"})
     */
    #[ORM\Column(name: 'door_code2', type: 'string', length: 8, nullable: true)]
    #[Assert\Length(max: 8, groups: ['mbiz_coliship', 'sylius_shipping_address_update'])]
    protected ?string $doorCode2 = null;

    /**
     * @ORM\Column(name="intercom", type="string", length=30, nullable=true)
     *
     * @Assert\Length(max=30, groups={"mbiz_coliship", "sylius_shipping_address_update"})
     */
    #[ORM\Column(name: 'intercom', type: 'string', length: 30, nullable: true)]
    #[Assert\Length(max: 30, groups: ['mbiz_coliship', 'sylius_shipping_address_update'])]
    protected ?string $intercom = null;

    /**
     * @ORM\Column(name="shipping_instruction", type="string", length=70, nullable=true)
     *
     * @Assert\Length(max=70, groups={"mbiz_coliship", "sylius_shipping_address_update"})
     */
    #[ORM\Column(name: 'shipping_instruction', type: 'string', length: 70, nullable: true)]
    #[Assert\Length(max: 70, groups: ['mbiz_coliship', 'sylius_shipping_address_update'])]
    protected ?string $shippingInstructions = null;

    /**
     * @ORM\Column(name="recipient_reference", type="string", length=17, nullable=true)
     *
     * @Assert\Length(max=17, groups={"mbiz_coliship", "sylius_shipping_address_update"})
     */
    #[ORM\Column(name: 'recipient_reference', type: 'string', length: 17, nullable: true)]
    #[Assert\Length(max: 17, groups: ['mbiz_coliship', 'sylius_shipping_address_update'])]
    protected ?string $recipientReference = null;

    public function getService(): ?string
    {
        return $this->service;
    }

    public function setService(?string $service): void
    {
        $this->service = $service;
    }

    public function getEntrance(): ?string
    {
        return $this->entrance;
    }

    public function setEntrance(?string $entrance): void
    {
        $this->entrance = $entrance;
    }

    public function getLocality(): ?string
    {
        return $this->locality;
    }

    public function setLocality(?string $locality): void
    {
        $this->locality = $locality;
    }

    public function getFloor(): ?string
    {
        return $this->floor;
    }

    public function setFloor(?string $floor): void
    {
        $this->floor = $floor;
    }

    public function getDoorCode1(): ?string
    {
        return $this->doorCode1;
    }

    public function setDoorCode1(?string $doorCode1): void
    {
        $this->doorCode1 = $doorCode1;
    }

    public function getDoorCode2(): ?string
    {
        return $this->doorCode2;
    }

    public function setDoorCode2(?string $doorCode2): void
    {
        $this->doorCode2 = $doorCode2;
    }

    public function getIntercom(): ?string
    {
        return $this->intercom;
    }

    public function setIntercom(?string $intercom): void
    {
        $this->intercom = $intercom;
    }

    public function getShippingInstructions(): ?string
    {
        return $this->shippingInstructions;
    }

    public function setShippingInstructions(?string $shippingInstructions): void
    {
        $this->shippingInstructions = $shippingInstructions;
    }

    public function getRecipientReference(): ?string
    {
        return $this->recipientReference;
    }

    public function setRecipientReference(?string $recipientReference): void
    {
        $this->recipientReference = $recipientReference;
    }
}
