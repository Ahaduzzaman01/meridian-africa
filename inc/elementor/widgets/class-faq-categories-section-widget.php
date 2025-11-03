<?php
/**
 * Elementor FAQ Categories Section Widget
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Meridian_Africa_FAQ_Categories_Section_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'meridian-faq-categories-section';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'FAQ Categories Section', 'meridian-africa' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-accordion';
	}

	/**
	 * Get widget categories.
	 *
	 * @since 1.0.0
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'meridian-africa' );
	}

	/**
	 * Get widget keywords.
	 *
	 * @since 1.0.0
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return array( 'faq', 'accordion', 'questions', 'answers', 'meridian', 'categories' );
	}

	/**
	 * Get script dependencies.
	 *
	 * @since 1.0.0
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return array( 'meridian-faq-script' );
	}

	/**
	 * Get style dependencies.
	 *
	 * @since 1.0.0
	 * @return array Widget styles dependencies.
	 */
	public function get_style_depends() {
		return array( 'meridian-faq-styles' );
	}

	/**
	 * Register widget controls.
	 *
	 * @since 1.0.0
	 */
	protected function register_controls() {
		$this->register_content_controls();
		$this->register_style_controls();
	}

	/**
	 * Register content controls.
	 *
	 * @since 1.0.0
	 */
	private function register_content_controls() {
		// FAQ Categories Section
		$this->start_controls_section(
			'faq_categories_section',
			array(
				'label' => esc_html__( 'FAQ Categories', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$repeater_categories = new Repeater();

		$repeater_categories->add_control(
			'category_icon',
			array(
				'label'   => esc_html__( 'Category Icon (Font Awesome class)', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'fas fa-circle-question',
			)
		);

		$repeater_categories->add_control(
			'category_title',
			array(
				'label'   => esc_html__( 'Category Title', 'meridian-africa' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'GENERAL & OVERVIEW',
			)
		);

		// FAQ Items Repeater
		$repeater_categories->add_control(
			'faq_items',
			array(
				'label'       => esc_html__( 'FAQ Items', 'meridian-africa' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $this->get_faq_item_fields(),
				'default'     => array(
					array(
						'question' => esc_html__( 'What is Meridian Sentinel?', 'meridian-africa' ),
						'answer'   => esc_html__( 'Meridian Sentinel is a satellite-based verification infrastructure...', 'meridian-africa' ),
					),
				),
				'title_field' => '{{{ question }}}',
			)
		);

		$this->add_control(
			'faq_categories',
			array(
				'label'       => esc_html__( 'Categories', 'meridian-africa' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater_categories->get_controls(),
				'default'     => $this->get_default_faq_data(),
				'title_field' => '{{{ category_title }}}',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Get FAQ item fields for nested repeater.
	 *
	 * @since 1.0.0
	 * @return array FAQ item fields.
	 */
	private function get_faq_item_fields() {
		$fields = array();

		$fields[] = array(
			'name'    => 'question',
			'label'   => esc_html__( 'Question', 'meridian-africa' ),
			'type'    => Controls_Manager::TEXT,
			'default' => esc_html__( 'Your question here?', 'meridian-africa' ),
		);

		$fields[] = array(
			'name'    => 'answer',
			'label'   => esc_html__( 'Answer', 'meridian-africa' ),
			'type'    => Controls_Manager::WYSIWYG,
			'default' => esc_html__( 'Your answer here...', 'meridian-africa' ),
		);

		return $fields;
	}

	/**
	 * Get default FAQ categories data from the original HTML template.
	 *
	 * @since 1.0.0
	 * @return array Default FAQ categories with all questions and answers.
	 */
	private function get_default_faq_data() {
		return array(
			// Category 1: GENERAL & OVERVIEW
			array(
				'category_icon'  => 'fas fa-circle-question',
				'category_title' => 'GENERAL & OVERVIEW',
				'faq_items'      => array(
					array(
						'question' => 'What is Meridian Sentinel ?',
						'answer'   => '<p>Meridian Sentinel is a satellite-based verification infrastructure that helps African governments and institutions prevent fraud in agricultural programs. Using freely available satellite imagery and machine learning, we can verify 100% of program beneficiaries at $0.40-2.00 per farmhectare—80% cheaper than manual verification ($50-100 per farm).</p>
<div>
<span>Key capabilities:</span>
<ui>
<li><i class="fas fa-check"></i> Detect ghost farms (zero vegetation)</li>
<li><i class="fas fa-check"></i>  Verify actual farm area (prevent area inflation)</li>
<li><i class="fas fa-check"></i> Identify crop types (prevent crop misreporting)</li>
<li><i class="fas fa-check"></i> Predict yields (estimate production)</li>
<li><i class="fas fa-check"></i> Monitor crop health in real-time (early warning)</li>
</ui>
</div>',
					),
					array(
						'question' => 'Who is Meridian Sentinel for ?',
						'answer'   => '<p>Our primary customers are :</p>

<span>African Governments (Ministries of Agriculture)</span>
<ul>
<li><i class="fas fa-check"></i> Input subsidy programs</li>
<li><i class="fas fa-check"></i> Cash transfer programs</li>
<li><i class="fas fa-check"></i> Crop insurance schemes</li>
<li><i class="fas fa-check"></i> Agricultural extension services</li>
</ul>

<span>Development Banks & Donors</span>
<ul>
<li><i class="fas fa-check"></i> World Bank agricultural projects</li>
<li><i class="fas fa-check"></i> African Development Bank programs</li>
<li><i class="fas fa-check"></i> USAID, DFID, EU development projects</li>
</ul>

<span> Insurance Companies</span>
<ul>
<li><i class="fas fa-check"></i> Index-based crop insurance</li>
<li><i class="fas fa-check"></i> Parametric insurance products</li>
<li><i class="fas fa-check"></i> Claims verification</li>
</ul>

<span> Input Suppliers & Agribusinesses</span>
<ul>
<li><i class="fas fa-check"></i> Distributor compliance monitoring</li>
<li><i class="fas fa-check"></i> Contract farming verification</li>
<li><i class="fas fa-check"></i> Supply chain traceability</li>
</ul>',
					),
					array(
						'question' => 'What problem does Meridian Sentinel solve ?',
						'answer'   => '<p>African governments lose billions annually to agricultural programfraud. The problems :</p>

<span>Current Situation:</span>
<ui>
<li><i class="fas fa-check"></i> Manual verification costs $50-100 per farm</li>
<li><i class="fas fa-check"></i> Only 5-10% of beneficiaries can be verified (budget constraints)</li>
<li><i class="fas fa-check"></i> Verification takes 6-18 weeks</li>
<li><i class="fas fa-check"></i> Field agents can be bribed</li>
</ui>

<span>Fraud Types :</span>
<ui>
<li><i class="fas fa-check"></i> <strong>Ghost farms : </strong> 10-20% of registered farms don\'t exist</li>
<li><i class="fas fa-check"></i> <strong>Area inflation : </strong> Farmers claim 5 hectares, actually farm1 hectare</li>
<li><i class="fas fa-check"></i> <strong>Crop misreporting : </strong> Claim high-value crops (rice), plant (maize)</li>
<li><i class="fas fa-check"></i> <strong>Multiple registrations : </strong> Same farmer registered in multiple districts</li>
</ui>

<span> <strong>Result : </strong>  Billions wasted, legitimate farmers can\'t access programs, poor policy decisions based on bad data</span>
<span> <strong>Our Solution :</strong>  100% verification at 80% lower cost using satellites</span>',
					),
					array(
						'question' => 'How is Meridian Sentinel different from other satellite agriculturecompanies ?',
						'answer'   => '<p>We\'re specifically built for fraud detection in African smallholder agriculture</p>
<span>
Commercial providers typically charge between $5 and $20 per farm, focusing primarily on yield monitoring for commercial farms operating in larger fields ranging from 2 to 10 hectares. Their solutions are generally proprietary black-box models, deployed exclusively on the cloud, and are mainly used in global markets such as the USA and Europe. In contrast, Meridian Sentinel offers a much more affordable solution, costing only $0.40 to $2.00 per farm, and is designed to detect fraud rather than just monitor yield. It specifically targets smallholder farmers managing tiny plots of land (around 0.1 to 2 hectares), with a focus on African regions. Unlike commercial providers, Meridian Sentinel uses open-source, transparent models and provides flexible deployment options, including cloud, on-premise, and hybrid setups.
</span>

<span>Key differentiators : </span>
<ui>
<li> 10-50x cheaper than alternatives</li>
<li>Purpose-built for fraud detection (not generic monitoring)</li>
<li> Trained on 19,000+ African fields (Nigeria, Ghana, Kenya)</li>
<li> Works on smallholder mixed cropping systems</li>
<li> Open-source ML models (transparent, auditable)</li>
<li> Government-friendly (data sovereignty, on-premise option)</li>
</ui>',
					),
				),
			),
			// Category 2: HOW IT WORKS (TECHNICAL)
			array(
				'category_icon'  => 'fas fa-cogs',
				'category_title' => 'HOW IT WORKS (TECHNICAL)',
				'faq_items'      => array(
					array(
						'question' => 'How does satellite verification work ?',
						'answer'   => '<span>5-step process :</span>

<div>
<strong>STEP 1: Government/Executing Organisation (EO) uploads beneficiarylist</strong>
<ul>
<li>Required data :</li>
<li> Farmer name</li>
<li>National ID number</li>
<li> GPS coordinates (latitude, longitude) OR address</li>
<li> Declared crop type</li>
<li> Declared farm area (hectares)</li>
</ul>
</div>

<div>
<strong>STEP 2: We extract satellite imagery</strong>
<span>Data sources : </span>
<ul>
<li>Sentinel-2: 10m resolution, every 5 days (FREE fromESA)</li>
<li>Landsat 8/9: 30m resolution, every 16 days (FREE fromNASA)</li>
<li>SentinelSentinel-1 SAR: 10m, cloud-penetrating radar (FREE)</li>
</ul>
</div>

<div>
<strong>STEP 3: Machine learning analysis</strong>
<span>10 ML models analyze each farm: </span>

<div>
<span>Field Boundary Detection</span>
<ul>
<li>Detects actual field boundaries</li>
<li>Calculates actual area (hectares)</li>
<li>Compares to declared area</li>
<li>FLAGS if difference >20%</li>
</ul>
</div>

<div>
<span>Crop Classification</span>
<ul>
<li>Analyzes NDVI time series (vegetation patterns)</li>
<li>Identifies crop type (maize, rice, cassava, etc.)</li>
<li>Compares to declared crop</li>
<li>AnFLAGS if mismatch</li>
</ul>
</div>

<div>
<span>Yield Prediction</span>
<ul>
<li>Predicts yield (tons/hectare)</li>
<li> Uses satellite data + weather + soil</li>
<li>Compares to historical averages</li>
<li> FLAGS if suspiciously low (abandoned field)</li>
</ul>
</div>

<div>
<span> Supporting models :</span>
<ul>
<li>Planting date detection</li>
<li> Harvest date detection</li>
<li>Crop health monitoring</li>
<li> Drought/pest impact</li>
</ul>
</div>
</div>

<div>
<strong>STEP 4: Fraud flagging</strong>

<div>
<span>Risk scoring (0-100):</span>
<ul>
<li>HIGH RISK (80-100): Area inflation >50%, wrong crop, zero vegetation</li>
<li>MEDIUM RISK (50-79): Area mismatch 20-50%, low yield, late planting</li>
<li> LOW RISK (0-49): All verified, consistent with expectations</li>
</ul>
</div>

<div>
<ul>
<li>Ghost farm: Zero vegetation detected.</li>
<li>Area inflation: Declared 5 ha, actual 1 ha.</li>
<li>Crop misreporting: Declared rice, actual maize.</li>
<li>Abandonment: Planted but not maintained</li>
</ul>
</div>
</div>

<div>
<strong>STEP 5: Government/EO action</strong>

<div>
<span>Dashboard shows :</span>
<ul>
<li>Verified farms (90-95%): Approve automatically</li>
<li>Flagged farms (5-10%): Investigate with field visits</li>
</ul>
</div>

<div>
<span>Government/EO investigates ONLY high-risk cases (5-10%of total)</span>
<ul>
<li>90-95% auto-verified (no field visit needed)</li>
<li>Massive cost savings</li>
</ul>
</div>
</div>',
					),
					array(
						'question' => 'What if there\'s cloud cover? Can satellites see through clouds ?',
						'answer'   => '<p>Cloud cover is manageable with our multi-temporal approach :</p>

<div>
<strong>The Challenge :</strong>
<ul>
<li>Tropical Africa has 50-80% cloud cover during rainy season</li>
<li>Optical satellites (Sentinel-2, Landsat) cannot see through clouds</li>
</ul>
</div>

<div>
<strong>Our Solutions :</strong>
<span>CLOUD MASKING (Automatic)</span>
<span>Machine learning identifies clouds automatically :</span>
<ul>
<li>Cloud detection algorithm (99% accuracy)</li>
<li>Removes cloud pixels</li>
<li>Fills gaps with temporal interpolation</li>
<li>Creates seamless composite</li>
</ul>
</div>

<div>
<strong>SYNTHETIC APERTURE RADAR (SAR) (Backup)</strong>
<span>Sentinel-1 SAR penetrates clouds !</span>
<ul>
<li>Uses radar waves (not optical light)</li>
<li>Works in any weather</li>
<li>10m resolution</li>
<li>Good for: Crop detection, field boundaries, irrigation</li>
<li>Not as good for: Crop types (needs optical data)</li>
<li>Strategy: Use SAR when optical data insufficient</li>
</ul>
</div>',
					),
					array(
						'question' => 'What if farmers don\'t have GPS coordinates ?',
						'answer'   => '<strong class="margin-faq"  >Multiple solutions, no problem:</strong>
<span>OPTION 1: Address Geocoding (Most common)</span>

<div>
<span>Farmers provide :</span>
<ul>
<li>Village/district name</li>
<li>Local landmarks</li>
<li>Directions ("500m north of village chief\'s house")</li>
</ul>
</div>

<div>
<span>We use :</span>
<ul>
<li>Google Maps API</li>
<li>OpenStreetMap</li>
<li>Bing Maps API</li>
<li>Local GIS databases</li>
<li>Convert addresses to GPS coordinates</li>
<li>Accuracy: 90-95% (within 100-500 meters)</li>
<li>Good enough for satellite verification (10m resolution)</li>
</ul>
</div>

<div>
<strong>OPTION 2: Mobile App (For new registrations)</strong>
<span>Government field agents use mobile app :</span>
<ul>
<li>Phone GPS captures coordinates automatically</li>
<li>Photo of farm (for verification)</li>
<li>Farmer details entered in app</li>
<li>Syncs to cloud database</li>
</ul>
</div>

<div>
<strong>OPTION 3: Map Interface (Government/EO office)</strong>
<span>Government/EO staff use web-based map tool :</span>
<ul>
<li>Zoom to village/district</li>
<li>Click on farm location</li>
<li>System records GPS coordinates</li>
<li>Farmer verifies location (SMS with map link)</li>
<li>Accuracy: 50-100 meters (depends on staff knowledge)</li>
<li>Fast: 2-3 minutes per farmer</li>
</ul>
</div>

<div>
<strong>OPTION 4: Farmer Self-Registration (Future)</strong>
<span>Farmers use USSD/SMS :</span>
<ul>
<li>Dial shortcode (e.g., *123*FARM#)</li>
<li>Phone GPS captures location</li>
<li>Farmer confirms via SMS</li>
<li>System validates and registers</li>
</ul>
</div>

<div>
<strong>Pilot Experience :</strong>
<ul>
<li>30% of beneficiary lists had bad/missing GPS coordinates</li>
<li>Solution: Used address geocoding + manual correction</li>
<li>Result: 95% of addresses successfully geocoded</li>
<li>Remaining 5%: Government field agents collected GPS</li>
</ul>
</div>

<div>
<strong>Recommendation: Don\'t let missing GPS stop you! </strong>
<ul>
<li>Start with what you have (addresses)</li>
<li>We\'ll geocode automatically</li>
<li>Field agents fill gaps (5-10% of farms)</li>
<li>Build GPS database over time</li>
</ul>
</div>',
					),
					array(
						'question' => 'How does the system handle mixed cropping? African farmers often plant multiple crops in the same field.',
						'answer'   => '<strong class="margin-faq">Good question! We specifically designed for this:</strong>

<ul>
<li>African smallholders practice intercropping (maize +beans, cassava + maize)</li>
<li>European/American models trained on monoculture (single cropper field)</li>
<li>Standard crop classification fails on mixed crops</li>
</ul>

<div>
<strong>Our Solution :</strong>
<span> MULTI-CLASS CLASSIFICATION (Primary approach)</span>
<span>Instead of: "This field is maize OR beans"</span>
<span>We classify: "This field is maize + beans (intercrop)"</span>

<div>
<span>Classes in our model :</span>
<ul>
<li>Maize (pure)</li>
<li>Cassava (pure)</li>
<li>Rice (pure)</li>
<li>Sorghum (pure)</li>
<li>Millet (pure)</li>
<li>Beans (pure)</li>
<li>Maize + Beans (intercrop)</li>
<li>Maize + Cassava (intercrop)</li>
<li>Cassava + Beans (intercrop)</li>
<li>Other (mixed)</li>
</ul>
</div>

</div>

<div>
<strong>SPECTRAL UNMIXING (Advanced technique)</strong>

<div>
<span>Estimate proportion of each crop :</span>
<ul>
<li>60% maize, 40% beans</li>
<li>70% cassava, 30% maize</li>
<li>Useful for yield estimation</li>
</ul>
</div>

<div>
<span>Method: Analyze spectral signatures</span>
<ul>
<li>Maize signature: High NIR, medium Red</li>
<li>Beans signature: Medium NIR, low Red</li>
<li>Combined: Weighted average</li>
</ul>
</div>

<div>
<strong>Fraud Detection Impact : </strong><span>Mixed cropping actually helps fraud detection :</span>
<ul>
<li>Fraudsters typically claim pure, high-value crops (e.g., rice)</li>
<li>Real farmers often intercrop (maize + beans)</li>
<li>Mismatch between claimed and detected crop is a fraud indicator</li>
</ul>
</div>

<div>
<strong>Example : </strong>
<span>Farmer claims: "I\'m planting pure rice (high subsidy)" <br> Satellite detects: Maize + cassava intercropping</span>
<ul>
<li>FLAG for investigation</li>
<li>Likely fraud (wrong crop claimed)</li>
</ul>

<span><strong>Bottom line :</strong> Mixed cropping is not a limitation—our models are trainedspecifically for this African context.</span>
</div>

</div>',
					),
				),
			),
			// Category 3: ACCURACY & RELIABILITY
			array(
				'category_icon'  => 'fas fa-credit-card',
				'category_title' => 'ACCURACY & RELIABILITY',
				'faq_items'      => array(
					array(
						'question' => 'What happens if the model makes a mistake ?',
						'answer'   => '<strong class="margin-faq">Multiple safeguards prevent wrong decisions : </strong>
<strong>SAFETY MECHANISM 1 : Human-in-the-Loop</strong>
<p>We NEVER recommend automatic rejection based solely on satellite data.</p>

<div>
<span>Workflow :</span>
<ul>
<li>Satellite flags farm as high risk (e.g., "area inflation detected")</li>
<li>Government reviews on dashboard</li>
<li>Government field agent visits farm (physical verification)</li>
<li>Agent confirms or refutes satellite finding</li>
<li>Government/EO makes final decision (approve/reject/investigate further)</li>
<li>Human always makes final decision</li>
<li>Satellite provides evidence, not verdict</li>
<li>Prevents false rejections</li>
</ul>
</div>

<div>
<strong>SAFETY MECHANISM 2 : Risk Scoring (Not Binary)</strong>
<span>Instead of: "FRAUD" or "NOT FRAUD" (binary)
<br>
We provide: Risk score 0-100 (continuous)
</span>
<span>Example outputs:</span>
<ul>
<li>Score 95: Very high risk → Investigate immediately</li>
<li>Score 65: Medium risk → Review evidence, may investigate</li>
<li>Score 20: Low risk → Approve (likely legitimate)</li>
<li>Government/EO sets own threshold (e.g., investigate all >70)</li>
<li>Flexible based on resources available</li>
<li>Can adjust based on experience</li>
</ul>
</div>

<div>
<strong>SAFETY MECHANISM 3: Confidence Intervals</strong>
<span>For each prediction, we provide confidence :</span>
<ul>
<li>"Field area: 1.2 hectares (confidence: 85%)"</li>
<li>"Crop type: Maize (confidence: 92%)"</li>
<li>"Yield: 2.5 tons/ha (confidence: 70%)"</li>
<li>Low confidence predictions flagged for manual verification</li>
<li>Government knows when to trust satellite vs. field visit</li>
<li>Transparent about uncertainty</li>
</ul>
</div>

<div>
<strong>SAFETY MECHANISM 4: Multiple Check</strong>
<span>We don\'t flag based on single criterion :</span>
<span>Example: Area Inflation Check</span>
<ul>
<li>Declared: 5 hectares</li>
<li>Satellite detected: 1.2 hectares</li>
<li>Difference: -76% (huge discrepancy)</li>
</ul>
</div>

<div>
<span>But we also check:</span>
<ul>
<li>Crop health: Is vegetation present? (Yes)</li>
<li>Crop type: Does it match declared? (Yes, maize)</li>
<li>Historical: Has farmer been in program before? (Yes, 3 years, always legitimate)s</li>
<li>Only flag if multiple indicators point to fraud</li>
<li>Reduces false positives</li>
<li>Context-aware decisions</li>
</ul>
</div>

<div>
<strong>SAFETY MECHANISM 5 : Appeals Process</strong>
<span>Farmers can appeal if rejected :</span>
<ul>
<li>Government/EO notifies farmer of rejection</li>
<li>Farmer requests review (provide evidence)</li>
<li>Government/EO field agent re-verifies</li>
<li>If satellite was wrong, farmer approved + we retrain model</li>
<li>If farmer was fraudulent, rejection stands</li>
<li>Checks and balances</li>
<li>Protects legitimate farmers</li>
<li> Continuous improvement (learn from mistakes)</li>
</ul>
</div>

<div>
<strong>What if we find a systematic error ?</strong>
<span>Example: Model consistently underestimates cassava area by 20%</span>
<span>Our response : </span>
<ul>
<li>IMMEDIATE: Adjust model output (+20% correction for cassava)</li>
<li>SHORT-TERM: Retrain model with more cassava training data</li>
<li>LONG-TERM: Collect more ground truth, improve accuracy</li>
<li>COMPENSATION: Review and re-process affected cases (if farmers rejected)</li>
<li>Transparent about errors</li>
<li>Quick fixes</li>
<li>Continuous improvement</li>
</ul>
</div>',
					),
					array(
						'question' => 'Can the system detect new types of fraud we haven\'t seen before?',
						'answer'   => '<strong class="margin-faq">Yes, through anomaly detection:</strong>
<br>
<strong class="margin-faq">SUPERVISED LEARNING (Current):</strong>
<br>
<span>We train models on known fraud types:</span>
<br>
<ul>
<li>Ghost farms (zero vegetation)</li>
<li>Area inflation (boundary mismatch)</li>
<li>Crop misreporting (wrong crop)</li>
<li>Works well for known fraud patterns</li>
<li>89-94% detection rate</li>
</ul>
<span>Limitation :</span>
<br>
<span>Only detects fraud types we\'ve seen before</span>
<span>New fraud schemes may slip through</span>

<div>
<strong>UNSUPERVISED LEARNING (Advanced):</strong>
<br>
<span>We also use anomaly detection:</span>
<br>
<span>Method:</span>
<br>
<div>
<span>Build "normal farm" profile:</span>
<ul>
<li>• Typical NDVI patterns</li>
<li>• Expected area ranges</li>
<li>• Common crop combinations</li>
<li>• Historical farming behavior</li>
</ul>
</div>

<div>
<span>Flag anything significantly different:</span>
<ul>
<li>• NDVI pattern never seen before</li>
<li>• Impossibly high yield claims</li>
<li>• Suspicious location (middle of forest)</li>
<li>• Inconsistent temporal patterns</li>
<li>• Catches unknown fraud types</li>
<li>• Also catches data errors (wrong GPS coordinates)</li>
<li>• May have false positives (legitimate unusual cases)</li>
</ul>
</div>

<div>
<span>Performance:</span>
<ul>
<li>• Catches 60-70% of novel fraud</li>
<li>• 20% false positive rate (needs human review)</li>
<li>• Good for exploratory analysis</li>
</ul>
</div>

<div>
<strong>SPECIFIC NEW FRAUD TYPES WE CAN DETECT:</strong>
<br>
<span>RENTAL FRAUD</span>
<br>
<span>Scheme: Fraudster rents real farm for 1 month, registers for program, returns farm after verification</span>
<br>
<span>Detection:</span>
<ul>
<li>• Historical analysis: Was field green before?</li>
<li>• Ownership records: Does farmer match land registry?</li>
<li>• Neighbor comparison: Are surrounding farms registered to same person?</li>
<li>• Can flag suspicious cases for investigations</li>
</ul>
</div>

<div>
<strong>PHOTO FRAUD:</strong>
<br>
<span>Scheme: Fraudster submits photos of someone else\'s farm</span>
<br>
<span>Detection:</span>
<ul>
<li>• GPS mismatch: Photo GPS ≠ Declared farm GPS</li>
<li>• Temporal mismatch: Photo date outside growing season</li>
<li>• Duplicate photos: Same photo submitted for multiple farms</li>
<li>• Automatic photo forensics</li>
</ul>
</div>

<div>
<strong>IDENTITY FRAUD</strong>
<br>
<span>Scheme: One person registers under multiple identities</span>
<br>
<span>Detection:</span>
<ul>
<li>• GPS clustering: Multiple "different" farmers at same location</li>
<li>• Duplicate farms: Same farm boundary registered twice</li>
<li>• Cross-check with national ID database</li>
<li>• Requires integration with government systems</li>
</ul>
</div>

<div>
<strong>PROXY FARMING</strong>
<br>
<span>Scheme: Urban elite register as "farmers" using actual farmers as proxies</span>
<br>
<span>Detection:</span>
<ul>
<li>• Location analysis: Farmer address in city, farm in rural area</li>
<li>• Mobile money patterns: Subsidy paid to farmer, immediately transferred to someone else</li>
<li>• Cross-check: Is farmer on government payroll? (civil servants can\'t bebeneficiaries)</li>
<li>• Requires government data integration</li>
</ul>
</div>

<div>
<strong>TEMPORAL FRAUD</strong>
<br>
<span>Scheme: Plant crop AFTER receiving subsidy, harvest before inspection</span>
<br>
<span>Detection:</span>
<ul>
<li>• Planting date analysis: When did field turn green?</li>
<li>• Program timeline: Was planting before or after subsidy?</li>
<li>• CGrowing season length: Does it match crop type?</li>
<li>• Satellite temporal analysis catches this</li>
</ul>

<strong>LEARNING FROM NEW FRAUD:</strong>
<br>
<span>When government discovers new fraud type:</span>

<ul>
<li>DOCUMENTATION: Government/EO shares case details</li>
<li>ANALYSIS: We analyze satellite signatures of fraud</li>
<li>RETRAINING: Add new fraud examples to model</li>
<li>DEPLOYMENT: Updated model catches similar cases</li>
<li>RETROACTIVE: Re-scan past data for similar patterns</li>
<li>System gets smarter over time</li>
<li>Crowd-sourced fraud detection across all government partners</li>
<li>Network effect: Each government benefits from others\' discoveries</li>
</ul>

<strong>FRAUD EVOLUTION EXAMPLE:</strong>
<br>
<div>
<span>YEAR 1: Detect ghost farms (zero vegetation)</span>
<br>
<span>• Fraudsters adapt: Start planting real crops</span>
</div>

<div>
<span>YEAR 2: Detect area inflation (boundary mismatch)</span>
<br>
<span>• Fraudsters adapt: Claim correct area but wrong crop</span>
</div>

<div>
<span>YEAR 3: Detect crop misreporting (spectral analysis)</span>
<br>
<span>•  Fraudsters adapt: Rent real farms temporarily</span>
</div>

<div>
<span>YEAR 4: Detect rental fraud (historical analysis)</span>
<br>
<span>•  Fraudsters give up (too hard, not worth it)</span>
</div>

<span>Result: Cat-and-mouse game, but we\'re always learning Eventually: Fraud becomes more expensive than legitimate farming →Program succeeds.</span>
<br>
<span>
<strong>Bottom Line:</strong>
System detects both known and unknown fraud throughcombination of supervised learning (known patterns) and anomaly detection (unusual cases). Continuous learning from all partners improves detection over time
</span>
</div>
</div>',
					),
				),
			),
		);
	}

	/**
	 * Register style controls.
	 *
	 * @since 1.0.0
	 */
	private function register_style_controls() {
		// Section Style
		$this->start_controls_section(
			'section_style',
			array(
				'label' => esc_html__( 'Section Style', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'section_background',
			array(
				'label'     => esc_html__( 'Background Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .faq-section' => 'background: {{VALUE}};',
				),
			)
		);

		$this->add_responsive_control(
			'section_padding',
			array(
				'label'      => esc_html__( 'Padding', 'meridian-africa' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .faq-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();

		// Category Header Style
		$this->start_controls_section(
			'category_header_style',
			array(
				'label' => esc_html__( 'Category Header', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'category_title_color',
			array(
				'label'     => esc_html__( 'Title Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .category-header h2' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'category_icon_color',
			array(
				'label'     => esc_html__( 'Icon Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .category-header i' => 'color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_section();

		// FAQ Item Style
		$this->start_controls_section(
			'faq_item_style',
			array(
				'label' => esc_html__( 'FAQ Items', 'meridian-africa' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'question_color',
			array(
				'label'     => esc_html__( 'Question Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .faq-question h3' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'answer_color',
			array(
				'label'     => esc_html__( 'Answer Color', 'meridian-africa' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .faq-answer p' => 'color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render widget output on the frontend.
	 *
	 * @since 1.0.0
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<!-- FAQ Categories Section -->
		<section class="faq-section">
			<div class="container">
				<?php if ( ! empty( $settings['faq_categories'] ) ) : ?>
					<?php foreach ( $settings['faq_categories'] as $category_index => $category ) : ?>
						<!-- FAQ Category -->
						<div class="faq-category">
							<div class="category-header">
								<i class="<?php echo esc_attr( $category['category_icon'] ); ?>"></i>
								<h2><?php echo esc_html( $category['category_title'] ); ?></h2>
							</div>
							<div class="faq-grid">
								<?php if ( ! empty( $category['faq_items'] ) ) : ?>
									<?php foreach ( $category['faq_items'] as $item_index => $item ) : ?>
										<div class="faq-item">
											<div class="faq-question">
												<h3><?php echo esc_html( $item['question'] ); ?></h3>
												<i class="fas fa-chevron-down"></i>
											</div>
											<div class="faq-answer">
												<?php echo wp_kses_post( $item['answer'] ); ?>
											</div>
										</div>
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</section>

		<?php
	}

	/**
	 * Render widget output in the editor.
	 *
	 * @since 1.0.0
	 */
	protected function content_template() {
		?>
		<#
		if ( settings.faq_categories.length ) {
			#>
			<section class="faq-section">
				<div class="container">
					<#
					_.each( settings.faq_categories, function( category, categoryIndex ) {
						#>
						<div class="faq-category">
							<div class="category-header">
								<i class="{{ category.category_icon }}"></i>
								<h2>{{{ category.category_title }}}</h2>
							</div>
							<div class="faq-grid">
								<#
								if ( category.faq_items && category.faq_items.length ) {
									_.each( category.faq_items, function( item, itemIndex ) {
										#>
										<div class="faq-item">
											<div class="faq-question">
												<h3>{{{ item.question }}}</h3>
												<i class="fas fa-chevron-down"></i>
											</div>
											<div class="faq-answer">
												{{{ item.answer }}}
											</div>
										</div>
										<#
									});
								}
								#>
							</div>
						</div>
						<#
					});
					#>
				</div>
			</section>
			<#
		}
		#>
		<?php
	}
}

// Register widget
Plugin::instance()->widgets_manager->register( new Meridian_Africa_FAQ_Categories_Section_Widget() );

