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

The mathematical foundation of that traceability is **N/U Algebra**
(Zenodo: 10.5281/zenodo.17172694) — an uncertainty propagation framework
that produces closed-form, analytically exact uncertainty bounds at O(1)
complexity. Where conventional Monte Carlo methods approximate uncertainty
through repeated sampling, N/U Algebra computes it exactly. That means
every uncertainty in this research is not an estimate — it is a derivation.
SAID traces the research. N/U Algebra makes the uncertainty in that
research fully reproducible and verifiable at every step.

Together they answer the auditor's core question: not just *what* the
result is, but *how certain* it is and *why*, traceable back to first
principles.

---

## What it traces

- **Provenance** — where each result came from, down to the script and
  the input data
- **Uncertainty** — propagated analytically via N/U Algebra, not
  approximated; every bound is closed-form and re-derivable
- **Decisions** — what the researcher chose to do and why, at each step
- **AI interactions** — what was asked of an AI tool, what it returned,
  and what the researcher accepted, rejected, or modified
- **Timestamps** — Zenodo DOIs pre-date any claims associated with them;
  the record exists before the assertion does

An independent researcher without institutional infrastructure uses SAID
the way a lab maintains a research log: so the work can be checked,
challenged, and built on by anyone who needs to.

---

## How to audit this work

1. Every paper carries a Zenodo DOI. The DOI timestamp predates
   submission.
2. All code is open source and independently reproducible — running the
   scripts produces the same numbers.
3. Uncertainty bounds are analytically derived via N/U Algebra. They
   can be re-derived from the published formulas without running
   any simulation.
4. Session IDs in SAID records identify specific AI interactions. The
   prompt, the output, and the researcher's decision about what to use
   are all on record.
5. The math does not depend on the AI. The research can be verified
   without the session logs. The session logs exist so nothing has to
   be taken on trust.

---

## Where it is headed

N/U Algebra provides the uncertainty layer. SAID provides the provenance
layer. As AI becomes a genuine collaborator rather than just a tool, the
question of what a human researcher decided vs. what an AI produced
becomes harder to answer without documentation. SAID was built to be
valid at both ends of that spectrum — tool today, autonomous collaborator
tomorrow — with N/U Algebra ensuring the mathematical record is exact
regardless of who or what produced it.

Relevant standards this framework is designed to align with:

| Standard | Relevance |
|----------|-----------|
| IEEE P7001 | Transparency in autonomous systems |
| ISO/IEC 42001:2023 | AI management systems |
| ISO/IEC 23053 | Framework for ML-based AI systems |

---

**N/U Algebra** — Zenodo: 10.5281/zenodo.17172694
**SAID Framework** — Zenodo: 10.5281/zenodo.19230718

*The research is traceable. The uncertainty is exact. That is the point.*
