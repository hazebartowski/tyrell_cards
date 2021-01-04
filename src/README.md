##how to run
1. composer install
2. php artisan migrate:refresh --seed

Question 1 is run at homepage (url: '/')

The stacks used are PHP 8, Laravel 8, and vue.js
The time spent to solve this problem is 2 hours.
It is run on docker.

For question 2, the improved mysql query is as follows:

```mysql
SELECT Jobs.id AS `Jobs__id`,
       Jobs.name AS `Jobs__name`,
       Jobs.media_id AS `Jobs__media_id`,
       Jobs.job_category_id AS `Jobs__job_category_id`,
       Jobs.job_type_id AS `Jobs__job_type_id`,
       Jobs.description AS `Jobs__description`,
       Jobs.detail AS `Jobs__detail`,
       Jobs.business_skill AS `Jobs__business_skill`,
       Jobs.knowledge AS `Jobs__knowledge`,
       Jobs.location AS `Jobs__location`,
       Jobs.activity AS `Jobs__activity`,
       Jobs.academic_degree_doctor AS `Jobs__academic_degree_doctor`,
       Jobs.academic_degree_master AS `Jobs__academic_degree_master`,
       Jobs.academic_degree_professional AS `Jobs__academic_degree_professional`,
       Jobs.academic_degree_bachelor AS `Jobs__academic_degree_bachelor`,
       Jobs.salary_statistic_group AS `Jobs__salary_statistic_group`,
       Jobs.salary_range_first_year AS `Jobs__salary_range_first_year`,
       Jobs.salary_range_average AS `Jobs__salary_range_average`,
       Jobs.salary_range_remarks AS `Jobs__salary_range_remarks`,
       Jobs.restriction AS `Jobs__restriction`,
       Jobs.estimated_total_workers AS `Jobs__estimated_total_workers`,
       Jobs.remarks AS `Jobs__remarks`,
       Jobs.url AS `Jobs__url`,
       Jobs.seo_description AS `Jobs__seo_description`,
       Jobs.seo_keywords AS `Jobs__seo_keywords`,
       Jobs.sort_order AS `Jobs__sort_order`,
       Jobs.publish_status AS `Jobs__publish_status`,
       Jobs.version AS `Jobs__version`,
       Jobs.created_by AS `Jobs__created_by`,
       Jobs.created_at AS `Jobs__created`,
       Jobs.updated_at AS `Jobs__modified`,
       Jobs.deleted_at AS `Jobs__deleted`,
       JobCategories.id AS `JobCategories__id`,
       JobCategories.name AS `JobCategories__name`,
       JobCategories.sort_order AS `JobCategories__sort_order`,
       JobCategories.created_by AS `JobCategories__created_by`,
       JobCategories.created_at AS `JobCategories__created`,
       JobCategories.updated_at AS `JobCategories__modified`,
       JobCategories.deleted_at AS `JobCategories__deleted`,
       JobTypes.id AS `JobTypes__id`,
       JobTypes.name AS `JobTypes__name`,
       JobTypes.job_category_id AS `JobTypes__job_category_id`,
       JobTypes.sort_order AS `JobTypes__sort_order`,
       JobTypes.created_by AS `JobTypes__created_by`,
       JobTypes.created_at AS `JobTypes__created`,
       JobTypes.updated_at AS `JobTypes__modified`,
       JobTypes.deleted_at AS `JobTypes__deleted`
FROM jobs Jobs
         LEFT JOIN jobs_personalities JobsPersonalities ON Jobs.id = (JobsPersonalities.job_id)
         LEFT JOIN personalities Personalities ON (Personalities.id = (JobsPersonalities.personality_id) AND (Personalities.deleted_at) IS NULL)
         LEFT JOIN jobs_practical_skills JobsPracticalSkills ON Jobs.id = (JobsPracticalSkills.job_id)
         LEFT JOIN practical_skills PracticalSkills ON (PracticalSkills.id = (JobsPracticalSkills.practical_skill_id) AND (PracticalSkills.deleted_at) IS NULL)
         LEFT JOIN jobs_basic_abilities JobsBasicAbilities ON Jobs.id = (JobsBasicAbilities.job_id)
         LEFT JOIN basic_abilities BasicAbilities ON (BasicAbilities.id = (JobsBasicAbilities.basic_ability_id) AND (BasicAbilities.deleted_at) IS NULL)
         LEFT JOIN jobs_tools JobsTools ON Jobs.id = (JobsTools.job_id)
         LEFT JOIN affiliates Tools ON (Tools.type = 1 AND Tools.id = (JobsTools.affiliate_id) AND (Tools.deleted_at) IS NULL)
         LEFT JOIN jobs_career_paths JobsCareerPaths ON Jobs.id = (JobsCareerPaths.job_id)
         LEFT JOIN affiliates CareerPaths ON (CareerPaths.type = 3 AND CareerPaths.id = (JobsCareerPaths.affiliate_id) AND (CareerPaths.deleted_at) IS NULL)
         LEFT JOIN jobs_rec_qualifications JobsRecQualifications ON Jobs.id = (JobsRecQualifications.job_id)
         LEFT JOIN affiliates RecQualifications ON (RecQualifications.type = 2 AND RecQualifications.id = (JobsRecQualifications.affiliate_id) AND (RecQualifications.deleted_at) IS NULL)
         LEFT JOIN jobs_req_qualifications JobsReqQualifications ON Jobs.id = (JobsReqQualifications.job_id)
         LEFT JOIN affiliates ReqQualifications ON (ReqQualifications.type = 2 AND ReqQualifications.id = (JobsReqQualifications.affiliate_id) AND (ReqQualifications.deleted_at) IS NULL)
         INNER JOIN job_categories JobCategories ON (JobCategories.id = (Jobs.job_category_id) AND (JobCategories.deleted_at) IS NULL)
         INNER JOIN job_types JobTypes ON (JobTypes.id = (Jobs.job_type_id) AND (JobTypes.deleted_at) IS NULL)
WHERE (
              (
                      MATCH (Jobs.name, description, detail, business_skill, knowledge, location, activity, salary_statistic_group, salary_range_remarks, restriction, remarks) AGAINST ('*キャビンアテンダント*' IN BOOLEAN MODE)
                      OR MATCH (JobCategories.name) AGAINST ('*キャビンアテンダント*' IN BOOLEAN MODE)
                      OR MATCH (JobTypes.name) AGAINST ('*キャビンアテンダント*' IN BOOLEAN MODE)
                      OR MATCH (Personalities.name) AGAINST ('*キャビンアテンダント*' IN BOOLEAN MODE)
                      OR MATCH (PracticalSkills.name) AGAINST ('*キャビンアテンダント*' IN BOOLEAN MODE)
                      OR MATCH (Tools.name) AGAINST ('*キャビンアテンダント*' IN BOOLEAN MODE)
                      OR MATCH (CareerPaths.name) AGAINST ('*キャビンアテンダント*' IN BOOLEAN MODE)
                      OR MATCH (RecQualifications.name) AGAINST ('*キャビンアテンダント*' IN BOOLEAN MODE)
                      OR MATCH (ReqQualifications.name) AGAINST ('*キャビンアテンダント*' IN BOOLEAN MODE)
                  )
              AND publish_status = 1
              AND (Jobs.deleted_at) IS NULL
          )
GROUP BY Jobs.id
ORDER BY Jobs.sort_order desc,
         Jobs.id DESC LIMIT 50 OFFSET 0

```

indexing is also done
```mysql
ALTER TABLE jobs ADD FULLTEXT full(name, description, detail, business_skill, knowledge, location, activity, salary_statistic_group, salary_range_remarks, restriction, remarks);
ALTER TABLE job_categories ADD FULLTEXT full(name);
ALTER TABLE job_types ADD FULLTEXT full(name);
ALTER TABLE personalities ADD FULLTEXT full(name);
ALTER TABLE practical_skills ADD FULLTEXT full(name);
ALTER TABLE affiliates ADD FULLTEXT full(name);
ALTER TABLE basic_abilities ADD FULLTEXT full(name);
ALTER TABLE jobs ADD INDEX (sort_order,publish_status, deleted_at);
```

The time spent for this is 2 hours