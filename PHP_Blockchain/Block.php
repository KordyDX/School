<?php
class Block
{
    private int $id;
    private string $value;
    private string $hash;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue($value): static
    {
        $this->value = $value;
        return $this;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function setHash($hash): static
    {
        $this->hash = $hash;
        return $this;
    }

    public function generateHash(string $previousHash = ""): string
    {
        return hash("SHA512", $this->id . "|" . $this->value . "|" . $previousHash);
    }
}