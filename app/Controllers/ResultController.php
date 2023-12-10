<?php

class ResultController
{
    private function render(array $data): string
    {
        ob_start();
        extract($data);
        include(__DIR__ . "/../../templates/result.php");
        return ob_get_clean();
    }

    public function displayCoordinates(string $lat, string $lon): string
    {
        return $this->render(['lat' => $lat, 'lon' => $lon]);
    }

    public function displayLocation(string $fullAddress): string
    {
        return $this->render(['fullAddress' => $fullAddress]);
    }

    public function displayError(string $error): string
    {
        return $this->render(['error' => $error]);
    }
}
