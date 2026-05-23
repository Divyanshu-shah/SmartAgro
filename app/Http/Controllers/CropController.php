<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CropController extends Controller
{
    private $crops = [
        'rice' => [
            'title' => 'Rice Crop Protection',
            'bg_color' => '#f5f9fc',
            'heading_color' => '#1a5276',
            'border_color' => '#3498db',
            'subheading_color' => '#2874a6',
            'info_bg' => '#eaf2f8',
            'method_bg' => '#e8f8f5',
            'method_border' => '#1abc9c',
            'link_color' => '#3498db',
            'pesticides' => [
                ['name' => 'Chlorpyrifos', 'desc' => 'Organophosphate insecticide'],
                ['name' => 'Carbofuran', 'desc' => 'Systemic insecticide and nematicide'],
                ['name' => 'Malathion', 'desc' => 'Organophosphate insecticide'],
            ],
            'methods_title' => 'Detection Methods',
            'methods' => [
                ['name' => 'Chromatographic techniques', 'desc' => 'HPLC, GC-MS for accurate residue analysis'],
                ['name' => 'Immunoassay tests', 'desc' => 'Rapid field detection kits'],
                ['name' => 'Biosensor detection', 'desc' => 'Enzyme-based sensors for specific pesticides'],
                ['name' => 'Spectroscopic methods', 'desc' => 'FTIR and Raman spectroscopy'],
                ['name' => 'Colorimetric tests', 'desc' => 'Simple visual detection methods'],
            ],
            'tips' => [
                'Practice proper water management to reduce pest habitats',
                'Use resistant rice varieties when available',
                'Implement crop rotation with non-host crops',
                'Monitor fields regularly for early pest detection',
            ],
        ],
        'wheat' => [
            'title' => 'Wheat Crop Protection',
            'bg_color' => '#fcf5e8',
            'heading_color' => '#7d6608',
            'border_color' => '#f1c40f',
            'subheading_color' => '#9c7c1e',
            'info_bg' => '#fef9e7',
            'method_bg' => '#f8f9e8',
            'method_border' => '#b7950b',
            'link_color' => '#d4ac0d',
            'pesticides' => [
                ['name' => 'Glyphosate', 'desc' => 'Broad-spectrum systemic herbicide'],
                ['name' => '2,4-D', 'desc' => 'Selective systemic herbicide'],
                ['name' => 'Dicamba', 'desc' => 'Broadleaf herbicide'],
            ],
            'methods_title' => 'Safe Alternatives',
            'methods' => [
                ['name' => 'Integrated Pest Management (IPM)', 'desc' => 'Combines biological, cultural and chemical methods'],
                ['name' => 'Biological controls', 'desc' => 'Use of natural predators and parasites'],
                ['name' => 'Organic herbicides', 'desc' => 'Vinegar-based or citric acid solutions'],
                ['name' => 'Crop rotation', 'desc' => 'With legumes or other non-cereal crops'],
                ['name' => 'Mechanical weeding', 'desc' => 'Flame weeding or cultivation'],
            ],
            'tips' => [
                'Monitor fields for disease symptoms weekly',
                'Use certified disease-free seeds',
                'Adjust planting dates to avoid peak pest periods',
                'Maintain proper plant spacing for air circulation',
            ],
        ],
        'corn' => [
            'title' => 'Corn Crop Protection',
            'bg_color' => '#f0f8e8',
            'heading_color' => '#186a3b',
            'border_color' => '#27ae60',
            'subheading_color' => '#239b56',
            'info_bg' => '#e8f8ee',
            'method_bg' => '#e8f5e9',
            'method_border' => '#2ecc71',
            'link_color' => '#27ae60',
            'pesticides' => [
                ['name' => 'Atrazine', 'desc' => 'Selective triazine herbicide'],
                ['name' => 'Metolachlor', 'desc' => 'Chloroacetanilide herbicide'],
                ['name' => 'Acetochlor', 'desc' => 'Chloroacetanilide herbicide'],
            ],
            'methods_title' => 'Residue Analysis',
            'methods' => [
                ['name' => 'Multi-residue analysis', 'desc' => 'Simultaneous detection of multiple pesticides'],
                ['name' => 'QuEChERS method', 'desc' => 'Quick, Easy, Cheap, Effective, Rugged and Safe extraction'],
                ['name' => 'Mass spectrometry', 'desc' => 'LC-MS/MS for accurate identification'],
                ['name' => 'Field test kits', 'desc' => 'Rapid screening for common residues'],
                ['name' => 'Enzyme inhibition assays', 'desc' => 'For organophosphate detection'],
            ],
            'tips' => [
                'Rotate herbicides to prevent resistance',
                'Use soil-applied herbicides for early season control',
                'Monitor for corn borers and other insects',
                'Consider Bt corn varieties for insect resistance',
            ],
        ],
        'vege' => [
            'title' => 'Vegetable Crop Protection',
            'bg_color' => '#f9e8f5',
            'heading_color' => '#6c3483',
            'border_color' => '#9b59b6',
            'subheading_color' => '#8e44ad',
            'info_bg' => '#f5eef8',
            'method_bg' => '#f3e8f9',
            'method_border' => '#af7ac5',
            'link_color' => '#9b59b6',
            'pesticides' => [
                ['name' => 'Imidacloprid', 'desc' => 'Neonicotinoid insecticide'],
                ['name' => 'Cypermethrin', 'desc' => 'Pyrethroid insecticide'],
                ['name' => 'Mancozeb', 'desc' => 'Dithiocarbamate fungicide'],
            ],
            'methods_title' => 'Organic Solutions',
            'methods' => [
                ['name' => 'Neem oil', 'desc' => 'Effective against many pests and fungi'],
                ['name' => 'Diatomaceous earth', 'desc' => 'Physical insecticide that damages exoskeletons'],
                ['name' => 'Bacillus thuringiensis (Bt)', 'desc' => 'Natural bacterial insecticide'],
                ['name' => 'Companion planting', 'desc' => 'Strategic plant combinations that deter pests'],
                ['name' => 'Homemade sprays', 'desc' => 'Garlic, chili or soap-based sprays'],
            ],
            'tips' => [
                'Practice good sanitation in the garden',
                'Use floating row covers as physical barriers',
                'Encourage beneficial insects with flowering plants',
                'Rotate vegetable families each season',
                'Monitor plants regularly for early signs of problems',
            ],
        ],
    ];

    public function show($slug)
    {
        if (!isset($this->crops[$slug])) {
            abort(404);
        }

        $crop = $this->crops[$slug];
        return view('crop', compact('crop'));
    }
}
