-- Table: public.beverages

-- DROP TABLE IF EXISTS public.beverages;

CREATE TABLE IF NOT EXISTS public.beverages
(
    "idProdus" integer NOT NULL,
    "numeProdus" character varying COLLATE pg_catalog."default" NOT NULL,
    link character varying COLLATE pg_catalog."default" NOT NULL,
    acidulat boolean,
    natur boolean,
    calories character varying COLLATE pg_catalog."default",
    milk boolean,
    cof character varying COLLATE pg_catalog."default",
    gust character varying COLLATE pg_catalog."default",
    aroma character varying COLLATE pg_catalog."default",
    CONSTRAINT beverages_pkey PRIMARY KEY ("idProdus")
    )

    TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.beverages
    OWNER to postgres;