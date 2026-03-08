# Unified Cognition Framework (UCF)

[![License: CC BY-NC-SA 4.0](https://img.shields.io/badge/License-CC%20BY--NC--SA%204.0-lightgrey.svg)](https://creativecommons.org/licenses/by-nc-sa/4.0/)
![Status: Theoretical Framework](https://img.shields.io/badge/Status-Theoretical%20Framework-blue)
![Validation: Pre-registration Ready](https://img.shields.io/badge/Validation-Pre--registration%20Ready-green)

A mathematically grounded, systems‑engineering compatible framework for understanding, measuring, and optimizing human cognition – from altered social states to elite performance. Integrates computational psychiatry, predictive processing, neural criticality, and military-grade architecture (DoDAF/NASA) into a unified state‑space model.

**Repository Contents**  
- [`docs/Computational_Framework_Altered_Social_Cognition.pdf`](./docs/Computational_Framework_Altered_Social_Cognition.pdf) – Foundational computational philosophy and P‑B‑T model.  
- [`docs/CSRVA_Validation_Architecture.pdf`](./docs/CSRVA_Validation_Architecture.pdf) – Empirical validation protocols, pre‑registerable designs, and ethical safeguards.  
- [`docs/Unifying Cognitive Framework_ Science-Military Grade.pdf`](./docs/Unifying%20Cognitive%20Framework_%20Science-Military%20Grade.pdf) – Strategic integration with DoDAF, NASA, and cognitive warfare doctrine.

---

## Table of Contents

- [Overview](#overview)
- [The P‑B‑T Model](#the-p-b-t-model)
  - [Precision (P)](#precision-p)
  - [Boundary (B)](#boundary-b)
  - [Temporal (T)](#temporal-t)
- [Neural Criticality](#neural-criticality)
- [Inter‑Agent Coherence](#inter-agent-coherence)
- [Environmental Forcing Functions](#environmental-forcing-functions)
- [Military & Strategic Applications](#military--strategic-applications)
  - [OODA Loop as Active Inference](#ooda-loop-as-active-inference)
  - [DARPA HPO Programs](#darpa-hpo-programs)
  - [Cognitive Warfare](#cognitive-warfare)
- [CSRVA Validation Architecture](#csrva-validation-architecture)
- [Repository Contents](#repository-contents)
- [How to Use / Cite](#how-to-use--cite)
- [License](#license)
- [Contributing](#contributing)
- [Acknowledgements](#acknowledgements)

---

## Overview

The **Unified Cognition Framework** (UCF) proposes that the immense variety of human cognitive states – from severe psychopathology to elite tactical performance – can be described by a small set of continuously varying, mathematically defined parameters. By unifying:

- **Computational psychiatry** (active inference, predictive processing),
- **Neural criticality theory**,
- **Systems engineering** (DoDAF, NASA), and
- **Inter‑brain dynamics** (hyperscanning),

the framework provides a common language for researchers, clinicians, and military strategists to measure, predict, and ultimately optimize cognition at both individual and collective levels.

**Epistemic Status**  
This work is a **structured thought experiment and hypothesis generator**. It contains no original empirical data. All claims are presented as precisely specified, falsifiable hypotheses awaiting pre‑registered experimental testing. The companion [CSRVA Validation Architecture](./docs/CSRVA_Validation_Architecture.pdf) details exactly how to transition each hypothesis from philosophy to science.

---

## The P‑B‑T Model

The core of the framework is a three‑axis state space, each axis linked to established neural measurements.

### Precision (P)

**Definition** – The weighting of incoming sensory evidence relative to internally generated predictions.  
**Neural correlate** – Mismatch negativity (MMN) amplitude (EEG); modulated by dopaminergic gain.  
**Phenomenology** – High P → hyper‑salience, paranoia, grandiosity; Low P → anhedonia, cognitive flattening.  

**Operationalisation**  
\[
P = \frac{A_{\text{MMN}}}{\sigma_{\text{noise}}} \cdot \frac{1}{\tau_{\text{RT}}}
\]

### Boundary (B)

**Definition** – Functional separation between self‑referential (Default Mode Network) and externally directed processing.  
**Neural correlate** – DMN internal‑to‑external connectivity ratio (resting‑state fMRI).  
**Phenomenology** – High B → clear self/other demarcation; Low B → emotional contagion, merger, identity diffusion.  

**Operationalisation**  
\[
B = \frac{FC_{\text{DMN-internal}}}{FC_{\text{DMN-external}}}
\]

### Temporal (T)

**Definition** – Orientation of reward prediction along past‑to‑future horizon.  
**Behavioural proxy** – Delay discounting parameter \(k\) (hyperbolic discounting).  
**Phenomenology** – High positive T → future orientation; negative T → past‑locked rumination; T→0 → impulsive, no future simulation.  

**Operationalisation**  
\[
T = \text{z}\!\left(\log\frac{k_{\text{individual}}}{k_{\text{population median}}}\right)
\]

---

## Neural Criticality

Underpinning the three axes is the brain’s dynamical regime, measured by the **spectral radius** \(\rho\) of the multivariate autoregressive (MVAR) coefficient matrix from EEG.

- **Healthy range**: \(\rho \approx 0.82\)–\(0.94\) (near criticality)  
- **Supercritical** (\(\rho > 1.0\)) : chaotic, racing thoughts, mania  
- **Subcritical** (\(\rho < 0.9\)) : rigid, depressed, trapped attractors  

Criticality maximises dynamic range, information transmission, and computational capacity.

---

## Inter‑Agent Coherence

When two or more individuals interact, their brains can synchronise, forming emergent network phenomena measurable via hyperscanning.

- **Phase‑Locking Value (PLV)** – quantifies synchrony in specific frequency bands.  
- **Mutual Information (MI)** – information‑theoretic coupling.  

**Applications**  
- **Therapeutic rapport**: parent‑child dyads show high prefrontal PLV.  
- **Pathological coupling** (“Witch Spiral”): high‑P + low‑B individuals can enter a closed, hyper‑salient loop, experienced as “telepathy” or merger – explainable entirely by classical active inference without cognitive friction.  
- **Optimised teams**: trained operators can act as “stabilising fields”, loaning coherence to distressed members.

---

## Environmental Forcing Functions

Geophysical and atmospheric variables systematically modulate the P‑B‑T axes, acting as systemic “forcing functions”.

| Modulator | Mechanism | P‑B‑T Impact |
|-----------|-----------|--------------|
| Lunar cycles | Melatonin suppression, fluid dynamics | ↓B, ↑P (mania threshold lowered) |
| Schumann resonance (~7.83 Hz) | Earth‑ionosphere cavity matches theta EEG | Nudge ρ → supercritical |
| Geomagnetic storms (Kp index) | Neuro‑electrical micro‑currents | Inject noise; ↑P → paranoia |
| Barometric pressure drops | Intracranial pressure changes | B perturbations; “ungrounded” |
| Atmospheric ionisation | Serotonin depletion, oxidative stress | T collapse; impulsivity |

**Strategic implication** – Military commanders must monitor Kp index and ionisation as seriously as physical weather.

---

## Military & Strategic Applications

### OODA Loop as Active Inference

Boyd’s Observe‑Orient‑Decide‑Act loop is reinterpreted through the free‑energy principle:

- **Observe/Orient** – updating generative models via precision‑weighted prediction errors (critically dependent on P and B).  
- **Decision/Action** – policy selection that minimises expected free energy.  
- **Disruption** – injecting uncertainty dysregulates the adversary’s P, shattering their orientation and forcing a subcritical “crash” (\(\rho < 0.9\)).

### DARPA HPO Programs

- **TAILOR** – uses AI to leverage individual cognitive variances (the “tyranny of averages”) – P‑B‑T provides the required multidimensional taxonomy.  
- **RESTORE** – maps sleep architecture to sustain healthy P‑B‑T coordinates during sleep deprivation.

### Cognitive Warfare

Adversaries (e.g., Russia, China) already weaponise the cognitive domain:

> “By unleashing highly emotive, contradictory, and algorithmically micro‑targeted disinformation, adversaries artificially induce a state of high allostatic load and widespread prediction error – forcing a population into the computational coordinates of Borderline Personality Disorder.”

Defensive countermeasures require:
- **Cognitive I&W** fusion cells  
- **Neuro‑AI readiness** (volitional P‑B‑T control)  
- **Environmental monitoring**  
- **Ethical safeguards** (APA, CSRVA)

---

## CSRVA Validation Architecture

The [CSRVA Validation Architecture](./docs/CSRVA_Validation_Architecture.pdf) is a complete research‑design companion that specifies:

- **Operationalised measurement protocols** for P, B, T, and ρ with explicit units and null conditions.  
- **Six pre‑registerable experimental designs** (sample sizes, power analyses, analysis plans).  
- **Validated analysis function library** (Python pseudocode with input/output contracts).  
- **Mandatory ethical safeguards** (APA‑compliant, including stimulant‑challenge and psychiatric population protocols).  
- **Physics and logic constraints** to prevent pseudoscientific drift (causality, Shannon capacity, no quantum mechanisms).

Any hypothesis from the framework becomes **science** only after the complete five‑step cycle:  
1. Isolate a specific, falsifiable hypothesis.  
2. Pre‑register at OSF.io or ClinicalTrials.gov.  
3. Obtain funding, ethics approval, and informed consent.  
4. Collect data, analyse, and publish (including null results).  
5. Independent replication.

---

## Repository Contents

| File | Description |
|------|-------------|
| `docs/Computational_Framework_Altered_Social_Cognition.pdf` | Foundational text: P‑B‑T axes, neural criticality, inter‑agent coherence, speculative pillars. |
| `docs/CSRVA_Validation_Architecture.pdf` | Complete research‑design manual: measurement protocols, 6 pre‑registerable experiments, analysis library, ethical safeguards. |
| `docs/Unifying Cognitive Framework_ Science-Military Grade.pdf` | Strategic integration: DoDAF/NASA viewpoints, OODA loop, cognitive warfare, DARPA programs. |
| `README.md` | This file. |

---

## How to Use / Cite

**For researchers** – Use the CSRVA document to design pre‑registered experiments testing any of the framework’s predictions. The analysis functions are provided as pseudocode ready for implementation in Python (MNE, scikit‑learn, etc.).

**For military / strategic planners** – The unification document offers a blueprint for integrating cognitive metrics into existing enterprise architectures (DoDAF) and for developing cognitive‑defence capabilities.

**For clinicians** – The framework provides a dimensional language for understanding altered states, but **must not** be used for diagnosis or treatment. Always consult current DSM‑5/ICD‑11 guidelines.

**Citation**  
Please cite this repository and the specific PDF(s) you reference. Example:

> Unified Cognition Framework (2026). GitHub repository: GhostMeshIO/UnifiedCognitionFramework. https://github.com/GhostMeshIO/UnifiedCognitionFramework

For academic citations, include the DOI once assigned (planned).

---

## License

This work is licensed under a [Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License](https://creativecommons.org/licenses/by-nc-sa/4.0/).  
You are free to share and adapt the material for non‑commercial purposes, provided you give appropriate credit and distribute any contributions under the same license.

---

## Contributing

We welcome contributions that help move this framework from hypothesis toward empirical science.  
- **Issues** – Suggest new hypotheses, point out errors, or request clarifications.  
- **Pull requests** – Propose improvements to the documentation, additional references, or translations of the validation protocols into code (Python/MATLAB).  
- **Pre‑registered studies** – If you conduct a study based on this framework, please let us know so we can link to it.

Before contributing, please read our [Code of Conduct](CODE_OF_CONDUCT.md) (to be added).

---

## Acknowledgements

This framework synthesises decades of work by many researchers, including:

- Karl Friston (active inference, free energy principle)  
- Andy Clark (predictive processing)  
- John Beggs & Dietmar Plenz (neural criticality)  
- Guillaume Dumas (hyperscanning)  
- The DoD CIO office (DoDAF)  
- NASA systems engineering group  
- DARPA (TAILOR, RESTORE programs)

We also thank the computational psychiatry and cognitive neuroscience communities for providing the empirical foundations upon which this speculative edifice is built.

---

> **The map is not the territory. But a precise, honest map of unmeasured terrain is the necessary precondition for exploration.**
