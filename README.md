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

AI disclosure is one component of that traceability — not the whole
purpose. The whole purpose is to make the research auditable end to end.

---

## What it traces

- **Provenance** — where each result came from, down to the script and
  the input data
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
3. Session IDs in SAID records identify specific AI interactions. The
   prompt, the output, and the researcher's decision about what to use
   are all on record.
4. The math does not depend on the AI. The research can be verified
   without the session logs. The session logs exist so nothing has to
   be taken on trust.

---

## Where it is headed

As AI becomes a genuine collaborator rather than just a tool, the
question of what a human researcher decided vs. what an AI produced
becomes harder to answer without documentation. SAID was built to be
valid at both ends of that spectrum — tool today, autonomous collaborator
tomorrow.

Relevant standards this framework is designed to align with:

| Standard | Relevance |
|----------|-----------|
| IEEE P7001 | Transparency in autonomous systems |
| ISO/IEC 42001:2023 | AI management systems |
| ISO/IEC 23053 | Framework for ML-based AI systems |

---

*The research is traceable. That is the point.*
