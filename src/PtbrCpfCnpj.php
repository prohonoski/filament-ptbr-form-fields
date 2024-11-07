<?php

namespace Leandrocfe\FilamentPtbrFormFields;

use Closure;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;

class PtbrCpfCnpj extends TextInput
{
    protected function setUp(): void
    {
        $this->dynamic()
            ->dehydrateMask()
        ;
    }

    public function dehydrateMask(bool|Closure $condition = true): static
    {
        if ($condition) {
            $this->dehydrateStateUsing(
                fn($state): null|float => $state ?
                    floatval(
                        Str::of($state)
                            ->replace('.', '')
                            ->replace(',', '')
                            ->replace('-', '')
                            ->replace('/', '')
                            ->toString()
                    ) :
                    null
            );
        } else {
            $this->dehydrateStateUsing(null);
        }

        return $this;
    }

    public function dynamic(bool $condition = true): static
    {
        if ($condition) {
            $this->extraAlpineAttributes([
                'x-mask:dynamic' => '$input.length >14 ? \'99.999.999/9999-99\' : \'999.999.999-99\'',
            ])->minLength(14);
        }

        return $this;
    }

    public function cpf(string|Closure $format = '999.999.999-99'): static
    {
        $this->dynamic(false)
            ->extraAlpineAttributes([
                'x-mask' => $format,
            ]);

        return $this;
    }

    public function cnpj(string|Closure $format = '99.999.999/9999-99'): static
    {
        $this->dynamic(false)
            ->extraAlpineAttributes([
                'x-mask' => $format,
            ]);

        return $this;
    }
}
