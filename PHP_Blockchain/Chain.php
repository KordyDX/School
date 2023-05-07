<?php
require "Block.php";
require "IChain.php";

class Chain implements IChain
{
    private array $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function getLastBlock(): ?Block
    {
        if (empty($this->data)) {
            return null;
        }
        return $this->data[count($this->data) - 1];
    }

    public function addBlock(Block $block): static
    {
        $block->setId(count($this->data));
        $newHash = $block->generateHash($this->getLastBlock() instanceof Block ? $this->getLastBlock()->getHash() : "");
        $block->setHash($newHash);
        $this->data[] = $block;
        return $this;
    }

    public function getBlock(int $id): ?Block
    {
        if (isset($this->data[$id])) {
            return $this->data[$id];
        }
        return null;
    }

    public function isValid(): bool
    {
        $previousBlock = $this->getLastBlock();

        if ($previousBlock === null) {
            return true;
        }

        $block = end($this->data);

        if ($block->getHash() !== $block->generateHash($previousBlock->getHash())) {
            return false;
        }

        return true;
    }
}