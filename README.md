# SAID Framework
**Scientific AI Integrity Disclosure**

Eric D. Martin | ORCID: 0009-0006-5944-1742 | Zenodo: 10.5281/zenodo.19230718

---

## What it is

SAID is a traceability system for this research program. Every claim,
result, and decision in this body of work has a documented origin:
which dataset, which script, which session, which date. SAID is the
thread that connects a published number back to the moment it was
produced.

Three systems work together to make that traceability complete:

**N/U Algebra** (Zenodo: 10.5281/zenodo.17172694) — the mathematical
layer. Every uncertainty in this research is propagated analytically,
not approximated by Monte Carlo. Nominal and uncertainty travel together
as an ordered pair (n, u) through every calculation, at machine
precision. The audit trail is not just "what number" but "how certain,
and why."

**eBIOS** (Zenodo: 10.5281/zenodo.17400232) — the epistemic layer.
eBIOS is the cryptographic, immutable root that ensures AI systems
operating in this research cannot misrepresent their epistemic state.
It formalises the principle of bounded auditonomy: the freedom to
reason and assist, within an envelope of honest accountability. An
AI operating under eBIOS cannot exceed its truth envelope. Honesty
is a law of motion, not a license term.

**SAID** — the provenance layer. Session logs, timestamps, decisions,
and Zenodo DOIs that pre-date any claim they support.

---

## Auditnomous Research

The term is intentional. *Auditnomous* = auditable + autonomous. Not
standard terminology yet — but a more precise word for what this
research program produces: work that is independently verifiable at
every layer by design, not as an afterthought.

SAID, N/U Algebra, and eBIOS together make a research record
auditnomous: the provenance is logged, the uncertainty is exact, and
the epistemic state of every contributing system — human or AI — is
on record. An auditnomous result does not require trust. It provides
the means to verify.

---

## What it traces

- **Provenance** — where each result came from, down to the script and
  the input data
- **Uncertainty** — propagated analytically via N/U Algebra; every
  bound is closed-form and re-derivable, not sampled
- **Decisions** — what the researcher chose to do and why
- **AI interactions** — prompt, output, and researcher decision on
  record for every session
- **Timestamps** — Zenodo DOIs pre-date any claims they are
  associated with

An independent researcher without institutional infrastructure uses
SAID the way a lab maintains a research log: so the work can be
checked, challenged, and built on by anyone who needs to.

---

## Auditnomous Verification — How to check this work

1. Every paper carries a Zenodo DOI. The timestamp predates submission.
2. All code is open source and independently reproducible.
3. Uncertainty bounds are derived via N/U Algebra — re-derivable from
   the published formulas without running any simulation.
4. Session IDs in SAID records identify specific AI interactions.
   The prompt, the output, and the researcher's decision are on record.
5. The math does not depend on the AI. The research can be verified
   without the session logs. The logs exist so nothing has to be
   taken on trust.

---

## Standards alignment

| Standard | Relevance |
|----------|-----------|
| IEEE P7001 | Transparency in autonomous systems |
| ISO/IEC 42001:2023 | AI management systems |
| ISO/IEC 23053 | Framework for ML-based AI systems |

---

**N/U Algebra** — Zenodo: 10.5281/zenodo.17172694
**eBIOS** — Zenodo: 10.5281/zenodo.17400232
**SAID Framework** — Zenodo: 10.5281/zenodo.19230718

*The research is traceable. The uncertainty is exact. The reasoning is auditable. That is the point.*
