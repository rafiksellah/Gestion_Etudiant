<?php

namespace App\Entity;

use App\Repository\InfosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InfosRepository::class)]
class Infos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $rentalProperty = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $desiredDate = null;

    #[ORM\Column]
    private ?int $desiredTimeLease = null;

    #[ORM\Column]
    private ?int $numberTerms = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    private ?string $zib = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phoneHome = null;

    #[ORM\Column(length: 255)]
    private ?string $permissionStudy = null;

    #[ORM\Column(length: 255)]
    private ?string $homeCollege = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $remarque1 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $addInfo = null;

    #[ORM\ManyToOne(inversedBy: 'infos')]
    private ?Country $Country = null;

    #[ORM\ManyToOne(inversedBy: 'infos')]
    private ?DomaineDetude $domaineDetude = null;

    #[ORM\ManyToOne(inversedBy: 'infos')]
    private ?LocationUniversity $locationUniversity = null;

    #[ORM\ManyToOne(inversedBy: 'infos')]
    private ?Nationality $nationality = null;

    #[ORM\ManyToOne(inversedBy: 'infos')]
    private ?Program $program = null;

    #[ORM\ManyToOne(inversedBy: 'infos')]
    private ?University $university = null;

    #[ORM\ManyToOne(inversedBy: 'infos')]
    private ?StuedntResidance $studentResidance = null;

    #[ORM\Column(length: 255)]
    private ?string $surname = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $birthname = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birthday = null;

    #[ORM\Column(length: 255)]
    private ?string $sex = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $repeatEmail = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(length: 255)]
    private ?string $phone = null;

    #[ORM\Column]
    private ?bool $isSend = null;

    #[ORM\ManyToOne(inversedBy: 'infos')]
    private ?User $user = null;


    public function __construct()
    {
        
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRentalProperty(): ?string
    {
        return $this->rentalProperty;
    }

    public function setRentalProperty(string $rentalProperty): self
    {
        $this->rentalProperty = $rentalProperty;

        return $this;
    }

    public function getDesiredDate(): ?\DateTimeInterface
    {
        return $this->desiredDate;
    }

    public function setDesiredDate(\DateTimeInterface $desiredDate): self
    {
        $this->desiredDate = $desiredDate;

        return $this;
    }

    public function getDesiredTimeLease(): ?int
    {
        return $this->desiredTimeLease;
    }

    public function setDesiredTimeLease(int $desiredTimeLease): self
    {
        $this->desiredTimeLease = $desiredTimeLease;

        return $this;
    }

    public function getNumberTerms(): ?int
    {
        return $this->numberTerms;
    }

    public function setNumberTerms(int $numberTerms): self
    {
        $this->numberTerms = $numberTerms;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZib(): ?string
    {
        return $this->zib;
    }

    public function setZib(string $zib): self
    {
        $this->zib = $zib;

        return $this;
    }

    public function getPhoneHome(): ?string
    {
        return $this->phoneHome;
    }

    public function setPhoneHome(string $phoneHome): self
    {
        $this->phoneHome = $phoneHome;

        return $this;
    }

    public function getPermissionStudy(): ?string
    {
        return $this->permissionStudy;
    }

    public function setPermissionStudy(string $permissionStudy): self
    {
        $this->permissionStudy = $permissionStudy;

        return $this;
    }

    public function getHomeCollege(): ?string
    {
        return $this->homeCollege;
    }

    public function setHomeCollege(string $homeCollege): self
    {
        $this->homeCollege = $homeCollege;

        return $this;
    }

    public function getRemarque1(): ?string
    {
        return $this->remarque1;
    }

    public function setRemarque1(?string $remarque1): self
    {
        $this->remarque1 = $remarque1;

        return $this;
    }

    public function getAddInfo(): ?string
    {
        return $this->addInfo;
    }

    public function setAddInfo(?string $addInfo): self
    {
        $this->addInfo = $addInfo;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->Country;
    }

    public function setCountry(?Country $Country): self
    {
        $this->Country = $Country;

        return $this;
    }

    public function getDomaineDetude(): ?DomaineDetude
    {
        return $this->domaineDetude;
    }

    public function setDomaineDetude(?DomaineDetude $domaineDetude): self
    {
        $this->domaineDetude = $domaineDetude;

        return $this;
    }

    public function getLocationUniversity(): ?LocationUniversity
    {
        return $this->locationUniversity;
    }

    public function setLocationUniversity(?LocationUniversity $locationUniversity): self
    {
        $this->locationUniversity = $locationUniversity;

        return $this;
    }

    public function getNationality(): ?Nationality
    {
        return $this->nationality;
    }

    public function setNationality(?Nationality $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getProgram(): ?Program
    {
        return $this->program;
    }

    public function setProgram(?Program $program): self
    {
        $this->program = $program;

        return $this;
    }

    public function getUniversity(): ?University
    {
        return $this->university;
    }

    public function setUniversity(?University $university): self
    {
        $this->university = $university;

        return $this;
    }

    public function getStudentResidance(): ?StuedntResidance
    {
        return $this->studentResidance;
    }

    public function setStudentResidance(?StuedntResidance $studentResidance): self
    {
        $this->studentResidance = $studentResidance;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getBirthname(): ?string
    {
        return $this->birthname;
    }

    public function setBirthname(?string $birthname): self
    {
        $this->birthname = $birthname;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(string $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getRepeatEmail(): ?string
    {
        return $this->repeatEmail;
    }

    public function setRepeatEmail(string $repeatEmail): self
    {
        $this->repeatEmail = $repeatEmail;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function isIsSend(): ?bool
    {
        return $this->isSend;
    }

    public function setIsSend(bool $isSend): self
    {
        $this->isSend = $isSend;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }


}
